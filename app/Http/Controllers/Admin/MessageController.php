<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    
    public function index(){
        $this->middleware('auth');
    	$message=Message::all();
    	return view('admin.messages.index')->with('messages',$message);
    }

    public function destroy($id){
        $this->middleware('auth');
    	$message=Message::find($id);
    	$message->delete();
    	return redirect(route('messages.index'))->with('delete','Message has been deleted successfully');
    }

    public function store(Request $request){
    	$data=$this->validate($request,[
            'firstname'=>'required|string|max:255|min:3|max:20',
            'lastname'=>'required|string|min:2|max:20',
            'email'=>'required|string|email|max:255',
            'message'=>'required|string|min:8'
        ]);
        $message=new Message;
        $message->fname=$data['firstname'];
        $message->lname=$data['lastname'];
        $message->email=$data['email'];
        $message->message=$data['message'];
        $message->save();
        return redirect()->back()->with('success','Message has been successfully sent');
    }
}
