<?php

namespace App\Http\Controllers\Site;

use App\Contracts\AttributeContract;
use App\Contracts\BrandContract;
use App\Contracts\CategoryContract;
use App\Contracts\ProductContract;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    protected $categoryContract;
    protected $brandContract;
    protected $productContract;
    protected $attributeContract;

    public function __construct(CategoryContract $categoryContract,ProductContract $productContract,AttributeContract $attributeContract,BrandContract $brandContract)
    {
        $this->categoryContract = $categoryContract;
        $this->productContract = $productContract;
        $this->attributeContract = $attributeContract;
        $this->brandContract = $brandContract;
    }

    public function index()
    {
        $categories = Category::orderByRaw('-name ASC')->get()->nest();
        $products = $this->productContract->listProducts();
        $attributes = $this->attributeContract->listAttributes();
        $brands = $this->brandContract->listBrands();

        $newProducts =  collect(Product::where('featured',1)->with('images')->get())->chunk(3);

        return view('site.pages.category', compact('categories','products','newProducts','brands','attributes'));
    }

    public function show($slug)
    {
        $category = $this->categoryContract->findBySlug($slug);
        $products = $category->products;

        $categories = Category::orderByRaw('-name ASC')->get()->nest();
        $attributes = $this->attributeContract->listAttributes();
        $brands = $this->brandContract->listBrands();

        $newProducts =  collect(Product::where('featured',1)->with('images')->get())->chunk(3);

        return view('site.pages.category', compact('categories','category','products','newProducts','brands','attributes'));

    }

    public function sort(Request $request)
    {
        $products = Product::orderByRaw('-' . $request->input('sort') . ' ASC')->get();

        $categories = Category::orderByRaw('-name ASC')->get()->nest();
        $attributes = $this->attributeContract->listAttributes();
        $brands = $this->brandContract->listBrands();

        $newProducts =  collect(Product::where('featured',1)->with('images')->get())->chunk(3);

        return view('site.pages.category', compact('categories','products','newProducts','brands','attributes'));

    }

    public function showAttribute(Request $request)
    {
        $products = Product::join('product_attributes','products.id', '=', 'product_attributes.product_id')
                    ->where('product_attributes.value','=',$request->attribute)
                    ->select('products.*')
                    ->get();

        $categories = Category::orderByRaw('-name ASC')->get()->nest();
        $attributes = $this->attributeContract->listAttributes();
        $brands = $this->brandContract->listBrands();

        $newProducts =  collect(Product::where('featured',1)->with('images')->get())->chunk(3);

        return view('site.pages.category', compact('categories','products','newProducts','brands','attributes'));

    }
}
