<?php

namespace App\Providers;

use App\Models\Category;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
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
        View::composer('site.partials.hero', function ($view) {
            $view->with('categories', Category::orderByRaw('-name ASC')->get()->nest());
        });
    }
}
