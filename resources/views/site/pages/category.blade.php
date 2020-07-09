@extends('site.app')
@section('title',"Products")

@section('content')

<!--========================== Start Home Banner Area =================================-->

<section class="banner-area">
    <div class="container">
        <div class="banner-content">
            <div class="banner-title float-left">
                <h2>Shop Category</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
            <div class="banner-links float-right">
                <a class="item-link" href="">Home</a>
                <a class="item-link" href="">Shop</a>
                <a class="item-link" href="">Women Fashion</a>
            </div>
        </div>
    </div>
</section>


<!--========================== End Home Banner Area =================================-->

<!--========================== Start Product Area =================================-->

<section class="product-area">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <aside class="browse-category">
                    <h5>Browse Categories</h5>
                    <ul class="menu">
                        @foreach ($categories as $cat)
                        @foreach ($cat->items as $category)
                        <li>
                            {{ $category->name }}
                            @if($category->items->count() > 0)
                                <ul>
                                    @foreach ($category->items as $item)
                                        <li><a href="{{ route('category.show',$item->slug) }}">{{ $item->name }}</a></li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                        @endforeach
                    @endforeach 
                    </ul>
                </aside>
                <aside class="browse-brand">
                    <h5>Product Brand</h5>
                    <ul class="menu-brand">
                    @foreach ($brands as $brand)
                        <li>
                            <a href="#">{{ $brand->name }}</a>
                        </li>
                    @endforeach
                    </ul>
                </aside>
            </div>
            <div class="col-md-9">
                <div class="filtering">
                    <select name="" id="">
                        <option value="">Default Sorting</option>
                        <option value="">Default 01</option>
                        <option value="">Default 02</option>
                        <option value="">Default 03</option>
                    </select>
                    <select name="" id="">
                        <option value="">Show 12</option>
                        <option value="">Show 20</option>
                        <option value="">Show 30</option>
                    </select>
                </div>
                <div class="row">
                    @forelse ($products as $product)
                    <div class="col-md-4">
                        <div class="product-item">
                            <div class="product-img">
                                @if ($product->images->count() > 0)
                                <div class="img-wrap padding-y"><img src="{{ asset('storage/'.$product->images->first()->full) }}" alt=""></div>
                                @else
                                    <div class="img-wrap padding-y"><img src="https://via.placeholder.com/176" alt=""></div>
                                @endif
                                <div class="product-links">
                                    <a class="item-link" href="{{ route('product.show',$product->slug) }}"><i class="fa fa-eye"></i></a>
                                    <a class="item-link"><i class="fa fa-heart"></i></a>
                                    <a class="item-link"><i class="fa fa-shopping-cart"></i></a>
                                </div>
                            </div>
                            <div class="product-content">
                                <h4>{{ $product->name }}</h4>
                                @if ($product->sale_price != 0)
                                <div class="price-wrap">
                                    <span class="price"> {{ config('settings.currency_symbol').$product->sale_price }} </span>
                                    <del class="price-old"> {{ config('settings.currency_symbol').$product->price }}</del>
                                </div>
                                @else
                                    <div class="price-wrap">
                                        <span class="price"> {{ config('settings.currency_symbol').$product->price }} </span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    @empty
                        <p>No Products found in .</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>


<!--========================== End Product Area =================================-->

@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset("frontend/css/products.css") }}">
@endpush