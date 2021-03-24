<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
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

    public function index()
    {
        $product=Product::all();
        return view('admin.product.index')->with('product',$product);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
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
            'slug'=>'required|string|max:255|unique:products',
            'brand'=>'required|string|max:20',
            'image'=>'required|image|mimes:jpg,jpeg,png,gif,svg',
            'description'=>'required|string|min:80',
            'specification'=>'required|string|min:10',
        ]);
        $product = new Product;
        $product->name=$data['name'];
        $product->slug=$data['slug'];
        $product->brand=$data['brand'];
        if($request->hasFile('image')){
        $extension=$request->image->extension();
        $img_name=$request['slug'].'.'.$extension;
        $imagename=$request->image->storeAs('public/uploads/products',$img_name);
        $product->image=$imagename;
        }
        $product->description=$data['description'];
        $product->specification=$data['specification'];
        $product->save();
        return redirect(route('products.index'))->with('success','Product has been created successfully');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product=Product::find($id);
        return view('admin.product.view')->with('product',$product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=Product::find($id);
        return view('admin.product.edit')->with('product',$product);

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
            'slug'=>'required|string|max:255|unique:products,slug,'.$id,
            'brand'=>'required|string|max:20',
            'image'=>'sometimes|image|mimes:jpg,jpeg,png,gif,svg',
            'description'=>'required|string|min:100',
            'specification'=>'required|string|min:10',
        ]);
        if($request->status=='on')
        {
            $request['status']='active';
        }
        else{
            $request['status']='pending';
        }
        $product=Product::find($id);
        $product->name=$data['name'];
        $product->slug=$data['slug'];
        $product->brand=$data['brand'];
        if($request->hasFile('image')){
        $extension=$request->image->extension();
        $img_name=$request['slug'].'.'.$extension;
        Storage::delete($product->image);
        $imagename=$request->image->storeAs('public/uploads/products',$img_name);
        $product->image=$imagename; 
        }
        $product->description=$data['description'];
        $product->specification=$data['specification'];
        $product->status=$request['status'];
        $product->save();
        return redirect(route('products.index'))->with('success','Product has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::find($id);
        if($product->image){
            Storage::delete($product->image);
        }
        $product->delete();
        return redirect(route('products.index'))->with('delete','Product has been deleted successfully');
    }
}
