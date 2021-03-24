<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageSetting;
use Illuminate\Support\Facades\Storage;

class PageSettingController extends Controller
{
    public function edit(){
    	$setting=PageSetting::first();
    	return view('admin.setting')->with('setting',$setting);
    }

    public function update(Request $request,$id){
    	  $data=$this->validate($request,[
    		'name'=>'string|required|max:255',
    		'email'=>'required|string|email|max:255',
    		'number'=>'required|numeric|digits:10',
    		'logo'=>'sometimes|image|mimes:png',
    		'location'=>'required|string|max:150'
    	]);
        $page=PageSetting::find($id);
        $page->name=$data['name'];
        $page->email=$data['email'];
        $page->number=$data['number'];
        if($request->hasFile('logo')){
            $extension=$request->logo->extension();
        $img_name=$request['name'].'.'.$extension;
        Storage::delete($page->logo);
        $logoname=$request->logo->storeAs('public/uploads/pages',$img_name);
        $page->logo=$logoname;
        }
        $page->location=$data['location'];
        $page->save();
        return redirect(route('setting'))->with('success','Page Setting has been updated succesfully');

        }
}
