<?php

namespace App\Providers;

use App\Offer;
use App\Product;
use App\Service;
use App\Theme;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \View::composer('*', function ($view) {
            $view->with('isAdmin', (\Auth::user() && \Auth::user()->is_admin ? true : false));
            $view->with('themes', (Theme::get()));
            $view->with('services', (Service::get()));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
