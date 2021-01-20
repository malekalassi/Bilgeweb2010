<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
//          $products =Product::with('categories' ,'attributes.attributesValues.attribute' )->get();
        $products =Product::latest()->get();



        return view('site.pages.homepage' ,compact('products'));
    }

    public function test()
    {
        return $featuredCategories = Category::where('featured' , 1)->get();
    }

}
