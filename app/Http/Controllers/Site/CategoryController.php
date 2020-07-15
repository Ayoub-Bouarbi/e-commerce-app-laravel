<?php

namespace App\Http\Controllers\Site;

use App\Contracts\AttributeContract;
use App\Contracts\BrandContract;
use App\Contracts\CategoryContract;
use App\Contracts\ProductContract;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

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
        return view('site.pages.category', compact('categories','products','brands','attributes'));
    }

    public function show($slug)
    {
        $category = $this->categoryRepository->findBySlug($slug);
        $products = $category->products;
        $categories = Category::orderByRaw('-name ASC')->get()->nest();
        $attributes = $this->attributeContract->listAttributes();
        $brands = $this->brandContract->listBrands();

        return view('site.pages.category', compact('categories','category','products','brands','attributes'));

    }
}
