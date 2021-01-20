<?php

namespace App\Providers;

use App\Models\Category;

use App\models\Slide;
use Darryldecode\Cart\Cart;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('site.partials.nav', function ($view) {
            $view->with('categories', Category::orderByRaw('-name ASC')->get()->nest());
        });
        View::composer('site.partials.header' , function ($view){
            $view->with('cartCount', \Cart::count());
        });
        View::composer('site.includes.slider' , function ($view){
            $view->with('sliders', Slide::all());
        });
        View::composer('site.includes.featured-categories' , function ($view){
            $view->with('featuredCategories', Category::where('featured' , 1)->get());
        });
    }
}
