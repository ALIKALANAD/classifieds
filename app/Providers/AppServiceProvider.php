<?php

namespace App\Providers;

use App\Category;
use App\State;
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
        /*view()->share('categories', Category::all());*/
        view()->composer('layouts.partials.categories', function ($view) {
            $view->with('categories', Category::where('parent_id', 0)->get());
        });

        view()->composer('layouts.partials.states', function ($view) {
            $view->with('states', State::all());
        });

        view()->composer('index', function ($view) {
            $view->with('categories', Category::where('parent_id', 0)->get());
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
