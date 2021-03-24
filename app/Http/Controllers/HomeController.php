<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Service;
use App\Models\Product;
class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user=User::all()->count();
        $service=Service::all()->count();
        $product=Product::all()->count();
        return view('admin.home')->with([
                    'userno'=>$user,
                    'serviceno'=>$service,
                    'productno'=>$product
                ]);
    }
}
