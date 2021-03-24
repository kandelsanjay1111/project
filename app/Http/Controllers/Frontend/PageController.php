<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\PageSetting;
use App\Models\Page;

class PageController extends Controller
{
    public function product(){
    	$products=Product::all();
        $page=Page::where('name','product')->first();
    	return view('frontend.product')->with([
            'products'=>$products,
            'pages'=>$page
        ]);
    }

    public function show(Product $product){
         $products=Product::where('id','!=',$product->id)->get();
         $page=Page::where('name','product')->first();
    	return view('frontend.singleproduct')->with([
            'product'=>$product,
            'relatedproducts'=>$products,
            'pages'=>$page
        ]);
    }

    public function contact(){
    	$setting=PageSetting::first();
        $page=Page::where('name','contact')->first();
    	return view('frontend.contact')->with([
            'setting'=>$setting,
            'pages'=>$page
    ]);
    }
    
}
