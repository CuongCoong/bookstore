<?php

namespace App\Providers;

use App\helper\gio_hang;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use App\Models\Product_size;
use App\Models\User;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //Paginator::useBootstrap();
        view()->composer('*',function($view){
        $admin=User::inRandomOrder()->paginate(3);
        $ad_global=User::all();
        $gio_hang= new gio_hang();
        $banner=Banner::inRandomOrder()->limit(3)->get();
        $cus=auth('cus')->user();
        return $view->with(compact('banner','gio_hang','admin','cus','ad_global'));
       });
    }
}
