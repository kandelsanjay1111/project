<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Account;

class AccountController extends Controller
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
        $account=Account::all();
        return view('admin.accounts.index')->with('account',$account);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.accounts.create');
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
            'link'=>'required|url|max:255'
        ]);
        $account=new Account;
        $account->name=$data['name'];
        $account->url=$data['link'];
        $account->save();
        return redirect(route('accounts.index'))->with('success','Account has been created successfully');
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
        $account=Account::find($id);
        return view('admin.accounts.edit')->with('account',$account);
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
            'link'=>'required|url|max:255'
        ]);
        $account=Account::find($id);
        $account->name=$data['name'];
        $account->url=$data['link'];
        $account->save();
        return redirect(route('accounts.index'))->with('success','Account has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $account=Account::find($id);
        $account->delete();
        return redirect(route('accounts.index'))->with('delete','Account has been deleted');
    }
}
