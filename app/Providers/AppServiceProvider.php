<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{

    private $menu = [
        [
            "name" => "Home",
            "route" => "home"
        ],
        [
            "name" => "About",
            "route" => "about"
        ],
        [
            "name" => "Products",
            "route" => "products"
        ],
        [
            "name" => "Contact",
            "route" => "contact"
        ]
    ];
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
        View::share('menu', $this->menu);
        Paginator::useBootstrap();

    }
}
