<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['register'=>false,'reset'=>false,
'confirm'=>false]);

//Admin Routes
Route::prefix('admin')->group(function(){

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Admin user crud routes
Route::get('/user', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('user');
Route::get('/user/create', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('user-create');
Route::post('/user/store', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('user-store');
Route::get('user/{id}/edit',[App\Http\Controllers\Admin\UserController::class, 'edit'])->name('user-edit');
Route::post('user/{id}/update',[App\Http\Controllers\Admin\UserController::class, 'update'])->name('user-update');
Route::delete('user/{id}/destroy',[App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('user-destroy');
Route::get('user/editpassword',[App\Http\Controllers\Admin\UserController::class,'editpassword'])->name('editpassword');
Route::put('/user/updatepassword',[App\Http\Controllers\Admin\UserController::class,'updatepassword'])->name('updatepassword');
//Admin product crud routes
Route::resource('/products',App\Http\Controllers\Admin\ProductController::class);
//Admin service resource route
Route::resource('/services',App\Http\Controllers\Admin\ServiceController::class);
//Admin testimonial resource route
Route::resource('/testimonials',App\Http\Controllers\Admin\TestimonialController::class);
//Admin carousel resource route
Route::resource('/carousels',App\Http\Controllers\Admin\CarouselController::class);
//Admin clients resource route
Route::resource('/clients',App\Http\Controllers\Admin\ClientController::class);
//page setting route
Route::get('/setting',[App\Http\Controllers\Admin\PageSettingController::class,'edit'])->name('setting');
Route::post('/setting/{page}',[App\Http\Controllers\Admin\PageSettingController::class,'update'])->name('setting.update');
//social account resource account
Route::resource('/accounts',App\Http\Controllers\Admin\AccountController::class);
//pages resouce route
Route::resource('/page',App\Http\Controllers\Admin\PageController::class);

Route::get('/messages',[App\Http\Controllers\Admin\MessageController::class,'index'])->name('messages.index')->middleware('auth');
Route::delete('/messages/{id}',[App\Http\Controllers\Admin\MessageController::class,'destroy'])->name('messages.destroy')->middleware('auth');
Route::get('/about',[App\Http\Controllers\Admin\AboutController::class,'edit'])->name('about.index');
Route::post('/about',[App\Http\Controllers\Admin\AboutController::class,'update'])->name('about.update');
});


//Frontend routes
Route::get('/about',[App\Http\Controllers\Frontend\AboutController::class,'index'])->name('about');
Route::get('/product',[App\Http\Controllers\Frontend\PageController::class,'product'])->name('product');
Route::get('/product/{product}',[App\Http\Controllers\Frontend\PageController::class,'show'])->name('product.show');

Route::get('/contact',[App\Http\Controllers\Frontend\PageController::class,'contact'])->name('contact');
Route::post('/contacts',[App\Http\Controllers\Admin\MessageController::class,'store'])->name('contacts.store');
Route::get('/', [App\Http\Controllers\Frontend\HomeController::class,'index']);
