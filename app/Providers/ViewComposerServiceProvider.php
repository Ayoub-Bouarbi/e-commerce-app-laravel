<?php

namespace App\Providers;

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
        View::composer('site.partials.navbar', function ($view) {
            $view->with('cartCount', Cart::getContent()->count());
        });
    }
}
