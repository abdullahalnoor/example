<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use View;
use DB;
use App\Menu;
use App\SubMenu;
use App\AboutMenu;
use App\Address;
use App\LucumMenu;
use App\PracticeMenu;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        View::composer('*',function ($view){
            $view->with('menus', Menu::get());
        });
        View::composer('*',function($view){
            $view->with('address',Address::orderBy('id','desc')->first());
        });
        View::composer('*',function($view){
            $view->with('aboutMenus',AboutMenu::orderBy('id','desc')->get());
        });
        View::composer('*',function($view){
            $view->with('lucumMenus',LucumMenu::orderBy('id','desc')->get());
        });
        View::composer('*',function($view){
            $view->with('practiceMenus',PracticeMenu::orderBy('id','desc')->get());
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
