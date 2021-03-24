<?php

namespace App\Providers;
use App\Models\PageSetting;
use App\Models\Account;
use App\Models\About;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['frontend.layout.header','frontend.layout.footer','frontend.layout.topbar'], function($view){
            $setting=PageSetting::first();
            $account=Account::all();
            $about=About::select('description')->first();
            $view->with([
                'setting'=>$setting,
                'account'=>$account,
                'about'=>$about
            ]);
        });
    }
}
