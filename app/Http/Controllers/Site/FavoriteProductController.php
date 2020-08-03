<?php

namespace App\Http\Controllers\Site;

use App\Contracts\FavoriteProductContract;
use App\Contracts\ProductContract;
use App\Http\Controllers\Controller;
use App\Models\FavoriteProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteProductController extends Controller
{
    protected $favoriteProductContract;
    protected $productContract;

    public function __construct(FavoriteProductContract $favoriteProductContract,ProductContract $productContract)
    {
        $this->favoriteProductContract = $favoriteProductContract;
        $this->productContract = $productContract;
    }

    public function index()
    {

        return view('site.pages.favorite',compact('products'));
    }
    public function add($id)
    {

        $product = $this->productContract->findProductById($id);

        $favorite = new FavoriteProduct;

        $favorite->user_id = Auth::user()->id;
        $favorite->product_id = $product->id;

        $favorite->save();
        return redirect()->back();
    }
}
