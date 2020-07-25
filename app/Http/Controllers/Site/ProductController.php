<?php

namespace App\Http\Controllers\Site;

use App\Contracts\ProductContract;
use App\Contracts\AttributeContract;
use App\Contracts\BrandContract;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $attributeContract;
    protected $productContract;
    protected $brandContract;

    public function __construct(ProductContract $productContract,BrandContract $brandContract,AttributeContract $attributeContract)
    {
        $this->productContract = $productContract;
        $this->attributeContract = $attributeContract;
        $this->brandContract = $brandContract;
    }

    public function show($slug)
    {
        $product = $this->productContract->findProductBySlug($slug);
        $relatedProduct = [];
        $attributes = $this->attributeContract->listAttributes();

        return view('site.pages.product', compact('product', 'attributes','relatedProduct'));
    }

    public function search(Request $request)
    {
        $products = $this->productContract->findBySearchItem($request->input('search'));

        $categories = Category::orderByRaw('-name ASC')->get()->nest();
        $attributes = $this->attributeContract->listAttributes();
        $brands = $this->brandContract->listBrands();

        $newProducts =  collect(Product::where('featured',1)->with('images')->get())->chunk(3);
        
        return view('site.pages.category', compact('categories','products','newProducts','brands','attributes'));
    }

    public function addToCart(Request $request)
    {
        $product = $this->productContract->findProductByIdWithImages($request->input('productId'));
        $options = $request->except('_token', 'productId', 'price', 'qty');

        Cart::add([
            'id' => uniqid(),
            'name' => $product->name,
            'price' =>$request->input('price'),
            'quantity' => $request->input('qty'),
            'associatedModel' => $product,
            $options
        ]);

        return redirect()->back()->with('message', 'Item added to cart successfully.');
    }
    public function updateCart(Request $request)
    {
        Cart::update($request->input('cartId'),[
            'quantity' => [
                'relative' => false,
                'value' => $request->input("qty")
            ]
        ]);

        return redirect()->back()->with('message', 'Item Updated successfully.');
    }
}
