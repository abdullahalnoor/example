<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\Category;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//        View::share('name', 'Robin hood pandy');
        View::composer('*', function ($view) {
            $view->with('categories', Category::where('publication_status', 1)->get() );
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
