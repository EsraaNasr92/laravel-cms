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
        /*View::composer('home.*', function($view){
            $view->with('menuitems', \App\Models\Menu::get());
            //dd($menuArray);
            
        });*/

        View::composer('blog.*', function($view){
            $view->with('pages', \App\Models\Page::get());
            
        });

        

          

    }
}
