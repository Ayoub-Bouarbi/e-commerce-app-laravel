<?php

namespace App\Http\Controllers\Site;

use App\Contracts\ProductContract;
use App\Contracts\AttributeContract;
use App\Http\Controllers\Controller;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $attributeContract;
    protected $productContract;

    public function __construct(ProductContract $productContract,AttributeContract $attributeContract)
    {
        $this->productContract = $productContract;
        $this->attributeContract = $attributeContract;
    }

    public function show($slug)
    {
        $product = $this->productContract->findProductBySlug($slug);
        $attributes = $this->attributeContract->listAttributes();

        return view('site.pages.product', compact('product', 'attributes'));
    }
    public function addToCart(Request $request)
    {   
        // dd($request);
        $product = $this->productContract->findProductById($request->input('productId'));
        $options = $request->except('_token', 'productId', 'price', 'qty','image');
    
        Cart::add(uniqid(), $product->name, $request->input('price'), $request->input('qty'), $options);
    
        return redirect()->back()->with('message', 'Item added to cart successfully.');
    }
}
