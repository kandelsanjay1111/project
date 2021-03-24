<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page=Page::all();
        return view('admin.pages.index')->with('page',$page);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$this->validate($request,[
            'name'=>'required|string|max:50|min:3',
            'title'=>'required|string|max:255',
            'keywords'=>'required|string|max:255',
            'description'=>'required|string|min:10',
            'author'=>'required|string|min:3',
            'image'=>'image|mimes:jpg,jpeg,png,gif,svg',
        ]);
        $page=new Page;
        $page->name=$data['name'];
        $page->title=$data['title'];
        $page->meta_keyword=$data['keywords'];
        $page->meta_description=$data['description'];
        $page->meta_author=$data['author'];
        if($request->hasFile('logo')){
            $extension=$request->image->extension();
        $img_name=$request['name'].'.'.$extension;
        $imagename=$request->image->storeAs('public/uploads/pages',$img_name);
        $page->image=$imagename;
        }
        $page->save();
        return redirect(route('page.index'))->with('success','Page has been created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page=Page::find($id);
        return view('admin.pages.edit')->with('page',$page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=$this->validate($request,[
            'name'=>'required|string|max:50|min:3',
            'title'=>'required|string|max:255',
            'keywords'=>'required|string|max:255',
            'description'=>'required|string|min:10',
            'author'=>'required|string|min:3',
            'image'=>'image|mimes:jpg,jpeg,png,gif,svg',
        ]);
        $page=Page::findorFail($id);
        $page->name=$data['name'];
        $page->title=$data['title'];
        $page->meta_keyword=$data['keywords'];
        $page->meta_description=$data['description'];
        $page->meta_author=$data['author'];
        if($request->hasFile('image')){
            $extension=$request->image->extension();
        $img_name=$request['name'].'.'.$extension;
        Storage::delete($page->image);    
         $imagename=$request->image->storeAs('public/uploads/pages',$img_name);
        $page->image=$imagename;
        }
        $page->save();
        return redirect(route('page.index'))->with('success','Page has been updated successfully');
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page=Page::find($id);
        $page->delete();
        if($page->image)
        {
        Storage::delete($page->image);    
        }
        return redirect(route('page.index'))->with('delete','Page has been deleted');
    }
}
