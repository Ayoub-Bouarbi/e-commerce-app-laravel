<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $featuredProducts = Product::where('featured',1)->with('images')->with('category')->get();
        $newProducts = collect(Product::where('featured',1)->with('images')->with('category')->get())->chunk(3);

        $categories = Category::orderByRaw('-name ASC')->get()->nest();   


        return view('site.pages.index',compact('featuredProducts','categories','newProducts'));
    }
}
