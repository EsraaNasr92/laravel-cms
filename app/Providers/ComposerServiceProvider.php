<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('home.*', function($view){
            //$view->with('menuitems', \App\Models\MenuItem::where('menu_id', '=', '1')->get());
            $menuArray = $view->with('menuitems', \App\Models\Menu::get('content')->toArray());
            //dd($menuArray);
            
        });

        View::composer('blog.*', function($view){
            $view->with('pages', \App\Models\Page::get());
            
        });

    }
}
