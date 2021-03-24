<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
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
        $testimonial=Testimonial::all();
        return view('admin.testimonials.index')->with('testimonial',$testimonial);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonials.create');
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
            'name'=>'required|max:255|min:3|string',
            'post'=>'required|max:50|string',
            'image'=>'required|image|mimes:jpg,jpeg,png,gif,svg',
            'description'=>'required|string|min:20|max:255'
        ]);
        $testimonial= new Testimonial;
        $testimonial->name=$data['name'];
        $testimonial->post=$data['post'];
        $testimonial->description=$data['description'];
        if($request->hasFile('image')){
            $extension=$request->image->extension();
        $img_name=$request['name'].'.'.$extension;
        $imagename=$request->image->storeAs('public/uploads/testimonials',$img_name);
        $testimonial->image=$imagename;
        }
        $testimonial->save();
        return redirect(route('testimonials.index'))->with('success','Testimonial has been created succesfully');
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
        $testimonial=Testimonial::find($id);
        return view('admin.testimonials.edit')->with('testimonial',$testimonial);
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
            'name'=>'required|max:255|min:3|string',
            'post'=>'required|max:50|string',
            'image'=>'sometimes|image|mimes:jpg,jpeg,png,gif,svg',
            'description'=>'required|string|min:20|max:255'
        ]);

       $testimonial=Testimonial::findorFail($id);
        $testimonial->name=$data['name'];
        $testimonial->post=$data['post'];
        $testimonial->description=$data['description'];
        if($request->hasFile('image')){
            $extension=$request->image->extension();
        $img_name=$request['name'].'.'.$extension;
        $imagename=$request->image->storeAs('public/uploads/testimonials',$img_name);
        Storage::delete($testimonial->image);
            $testimonial->image=$imagename;
        }
        $testimonial->save();
        return redirect(route('testimonials.index'))->with('success','The user has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonial=Testimonial::find($id);
        $testimonial->delete();
        Storage::delete($testimonial->image);
        return redirect(route('testimonials.index'))->with('delete','Testimonial has been delete succesfully');
    }
}
