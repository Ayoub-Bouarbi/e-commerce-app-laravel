<?php

namespace App\Http\Controllers\Site;

use App\Contracts\BrandContract;
use App\Contracts\CategoryContract;
use App\Contracts\ProductContract;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryContract;
    protected $brandContract;
    protected $productContract;

    public function __construct(CategoryContract $categoryContract,ProductContract $productContract,BrandContract $brandContract)
    {
        $this->categoryContract = $categoryContract;
        $this->productContract = $productContract;
        $this->brandContract = $brandContract;
    }

    public function index()
    {
        $categories = $this->categoryContract->listCategories()->nest();
        $products = $this->productContract->listProducts();
        $brands = $this->brandContract->listBrands();
        return view('site.pages.category', compact('categories','products','brands'));
    }

    public function show($slug)
    {
        $category = $this->categoryRepository->findBySlug($slug);

        $categories = $this->categoryContract->listCategories()->nest();
        $products = $category->products;
        $brands = $this->brandContract->listBrands();

        return view('site.pages.category', compact('categories','products','brands'));
    }
}
