<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response

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
        $client=Client::all();
        return view('admin.clients.index')->with('client',$client);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.clients.create');     
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
            'email'=>'required|string|max:255|unique:clients',
            'number'=>'required|numeric|digits:10',
            'image'=>'required|image|mimes:jpg,jpeg,png,gif,svg'
        ]);
        if($request->hasFile('image')){
        $extension=$request->image->extension();
        $img_name=$request['name'].'.'.$extension;
        $imagename=$request->image->storeAs('public/uploads/clients',$img_name);
        }
        $client=new Client;
        $client->name=$data['name'];
        $client->email=$data['email'];
        $client->number=$data['number'];
        $client->image=$imagename;
        $client->save();
        return redirect(route('clients.index'))->with('success','Client has been created succesfully');
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
        $client=Client::findorFail($id);
        return view('admin.clients.edit')->with('client',$client);
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
            'email'=>'required|string|max:255|unique:clients,email,'.$id,
            'number'=>'required|numeric|digits:10',
            'image'=>'sometimes|image|mimes:jpg,jpeg,png,gif,svg'
        ]);

        $client=Client::find($id);
        $client->name=$data['name'];
        $client->email=$data['email'];
        $client->number=$data['number'];
        if($request->hasFile('image')){
            $extension=$request->image->extension();
        $img_name=$request['name'].'.'.$extension;
        $imagename=$request->image->storeAs('public/uploads/clients',$img_name);
        if($client->image){
        Storage::delete($client->image);   
        }
        $client->image=$imagename;
        }
        $client->save();
        return redirect(route('clients.index'))->with('success','Clients has been updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client=Client::find($id);
        $client->delete();
        Storage::delete($client->image);
        return redirect(route('clients.index'))->with('delete','Clients has been deleted succesfully');
    }
}
