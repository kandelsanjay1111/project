<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Carousel;
use Illuminate\Support\Facades\Storage;

class CarouselController extends Controller
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carousels=Carousel::all();
        return view('admin.carousel.index')->with('carousels',$carousels);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.carousel.create');
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
            'title'=>'required|string|max:255|min:8',
            'subtitle'=>'required|string|min:8',
            'image'=>'required|image|mimes:jpg,jpeg,png,gif,svg'
        ]);
        $carousel= new Carousel;
        $carousel->title=$data['title'];
        $carousel->description=$data['subtitle'];
        if($request->hasFile('image')){
            $extension=$request->image->extension();
        $img_name=$request['title'].'.'.$extension;
        $imagename=$request->image->storeAs('public/uploads/carousels',$img_name);
        }
        $carousel->image=$imagename;
        $carousel->save();
        return redirect(route('carousels.index'))->with('success','Carousel has been created succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $carousel=Carousel::findorFail($id);
        return view('admin.carousel.edit')->with('carousel',$carousel);
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
            'title'=>'required|string|max:255|min:8',
            'subtitle'=>'required|string|max:120|min:8',
            'image'=>'sometimes|image|mimes:jpg,jpeg,png,gif,svg'
        ]);
        
        $carousel=Carousel::find($id);
        $carousel->title=$data['title'];
        $carousel->description=$data['subtitle'];
        if($request->hasFile('image')){
            $extension=$request->image->extension();
        $img_name=$request['title'].'.'.$extension;
        Storage::delete($carousel->image);
        $imagename=$request->image->storeAs('public/uploads/carousels',$img_name);
        $carousel->image=$imagename;
        }
        $carousel->save();
        return redirect(route('carousels.index'))->with('succcess','Carousel has been updated succesfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carousel=Carousel::find($id);
        $carousel->delete();
        Storage::delete($carousel->image);
        return redirect(route('carousels.index'))->with('delete','Carousel has been deleted');
    }
}
