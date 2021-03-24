<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Client;
use App\Models\Page;

class AboutController extends Controller
{
    public function index(){
        $page=Page::where('name','about')->first();
    	$about=About::first();
    	$client=Client::select('image')->get();
    	return view('frontend.about')->with(
    		[
    			'about'=>$about,
                'clients'=>$client,
    			'pages'=>$page
    		]
    	);
    }

}
