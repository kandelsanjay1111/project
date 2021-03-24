<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
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

    public function edit(){
    	$about=About::first();
    	return view('admin.about')->with('about',$about);
    }

    public function update(Request $request){
    	 $data=$this->validate($request,[
            'description'=>'required|string|min:8',
            'image'=>'sometimes|image|mimes:jpg,jpeg,png,gif,svg'
        ]);
    	 $about=About::first();
    	 $about->description=$data['description'];
    	 if($request->hasFile('image')){
            $extension=$request->image->extension();
        $img_name='about'.'.'.$extension;
        Storage::delete($about->image);
        $imagename=$request->image->storeAs('public/uploads',$img_name);
        $about->image=$imagename;
        }
        $about->save();
        return redirect(route('about.index'))->with('success','The content has been updated succesfully');
    	   }
}
