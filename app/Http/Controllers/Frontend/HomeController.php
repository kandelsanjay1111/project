<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageSetting;
use App\Models\Account;
use App\Models\Carousel;
use App\Models\Product;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\Client;
use App\Models\Page;

class HomeController extends Controller
{
   public function index(){
   $setting=PageSetting::first();
   $carousel=Carousel::all();
   $account=Account::all();
   $product=Product::all();
   $service=Service::all();
   $testimonial=Testimonial::all();
   $client=Client::all();
   $page=Page::where('name','index')->first();

   return view('frontend.index')->with([
   	'account'=>$account,
   	'carousel'=>$carousel,
   	'products'=>$product,
      'services'=>$service,
      'testimonials'=>$testimonial,
      'clients'=>$client,
      'page'=>$page
   ]);

   }
}
