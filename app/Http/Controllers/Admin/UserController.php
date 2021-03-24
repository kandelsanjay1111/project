<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
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
        $user=User::all();
        return view('admin.user.index')->with('user',$user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
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
            'name'=>'required|string|max:255',
            'email'=>'required|string|email|max:255|unique:users',
            'password'=>'required|min:6|confirmed',
            'number'=>'required|numeric|digits:10',
        ]);

        $request['password']=bcrypt($request->password);
        $user=User::create($request->all());
        return redirect(route('user'))->with('success','Admin is created successfully');
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
        $user=User::find($id);
        return view('admin.user.edit')->with('user',$user);
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
            'name'=>'required|string|max:255',
            'email'=>'required|string|email|max:255|unique:users,email,'.$id,
            'number'=>'required|numeric|min:10',
        ]);
        if($request->status=='on')
        {
            $request['status']='yes';
        }
        else{
            $request['status']='no';
        }
        $user=User::find($id);
        $user->name=$data['name'];
        $user->email=$data['email'];
        $user->number=$data['number'];
        $user->status=$request['status'];
        $user->save();
        return redirect(route('user'))->with('success','Admin is updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::find($id);
        $user->delete();
        return redirect(route('user'))->with('delete','Admin has been deleted succesfully');
    }

    public function editpassword(){
        return view('admin.user.updatepassword');
    }

    public  function updatepassword(Request $request){
        $data=$request->validate([
            'password'=>'min:6|required_with:confirm_password|same:confirm_password',
            'confirm_password'=>'required'
        ]);
        $user=auth()->user();
        $user->password=Hash::make($request->password);
        $user->save();
        return redirect(route('user'))->with('success','Password has been updated successfully');
    }
}
