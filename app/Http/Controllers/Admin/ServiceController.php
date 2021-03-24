<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
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
        $service=Service::all();
        return view('admin.services.index')->with('service',$service);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services.create');
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
            'title'=>'required|max:255|min:5|string',
            'image'=>'required|image|mimes:jpg,jpeg,png,gif,svg',
            'description'=>'required|string|max:255'
        ]);
       
        $service = new Service;
        $service->title=$request['title'];
        $service->description=$request['description'];
        if($request->hasFile('image')){
        $extension=$request->image->extension();
        $img_name=$request['title'].'.'.$extension;
        $imagename=$request->image->storeAs('public/uploads/services',$img_name);
        $service->image=$imagename;
       }
        $service->save();
        return redirect(route('services.index'))->with('success','Service has been created successfuly');
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
        $service=Service::find($id);
        return view('admin.services.edit')->with('service',$service);
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
            'title'=>'required|max:255|min:5|string',
            'image'=>'sometimes|image|mimes:jpg,jpeg,png,gif,svg',
            'description'=>'required|string|max:255'
        ]);
        
       if($request->status=='on')
        {
            $request['status']='active';
        }
        else{
            $request['status']='inactive';
        }
        $service=Service::find($id);
        $service->title=$data['title'];
        $service->description=$data['description'];
        if($request->hasFile('image')){
        $extension=$request->image->extension();
        $img_name=$request['title'].'.'.$extension;
        $imagename=$request->image->storeAs('public/uploads/services',$img_name);
        Storage::delete($service->image);
        $service->image=$imagename;
       }
        $service->status=$request['status'];
        $service->save();
        return redirect(route('services.index'))->with('success','Service has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service=Service::find($id);
        $service->delete();
        if($service->image){
        Storage::delete($service->image);   
        }
        return redirect(route('services.index'))->with('delete','Service has been deleted successfully');
    }
}
