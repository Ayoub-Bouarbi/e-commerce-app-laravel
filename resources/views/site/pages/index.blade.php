@extends('site.app')
@section('title',"Home")

@section('content')

<!-- Banner Section Begin -->
<section class="banner">
    <div class="banner__item set-bg" data-setbg="{{ asset('img/hero/banner.jpg') }}">
        <div class="banner__text">
            <span>FRUIT FRESH</span>
            <h2>Vegetable <br />100% Organic</h2>
            <p>{{ __('Free Pickup and Delivery Available') }}</p>
            <a href="{{ route('category.index') }}" class="primary-btn">{{ __('SHOP NOW') }}</a>
        </div>
    </div>
</section>
<!-- Banner Section End -->

<!-- Categories Section Begin -->
<section class="categories">
    <div class="container">
        <div class="row">
            <div class="categories__slider owl-carousel">
                @foreach ($categories as $cat)
                    @foreach ($cat->items as $category)
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{ asset('storage/'.$category->image) }}">
                            <h5>
                                <a href="{{ route('category.show',$category->slug) }}">{{ $category->name }}</a>
                            </h5>
                        </div>
                    </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- Categories Section End -->

<!-- Featured Section Begin -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>{{ __("Featured Products") }}</h2>
                </div>
                <div class="featured__controls">
                    <ul>
                        <li class="active" data-filter="*">All</li>
                        @foreach ($categories as $cat)
                            @foreach ($cat->items as $category)
                                <li data-filter="{{ '.' . $category->slug }}">{{ Str::ucfirst($category->name) }}</li>
                            @endforeach
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="row featured__filter">
            @foreach ($featuredProducts as $product)
            <div class="col-lg-3 col-md-4 col-sm-6 mix {{ $product->category->slug }}">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg"
                        data-setbg="{{ $product->images->count() > 0 ? asset('storage/'.$product->images->first()->full) : '' }}">
                        <ul class="featured__item__pic__hover">
                            <li><a href="{{ route('product.show',$product->slug) }}"><i class="fa fa-eye"></i></a></li>
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="{{ route('product.show',$product->slug) }}">{{ Str::ucfirst($product->name) }}</a>
                        </h6>
                        <h5>{{ config('settings.currency_symbol') . $product->price }}</h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Latest Product Section Begin -->
<section class="latest-product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>{{ __('Latest Products') }}</h4>
                    <div class="latest-product__slider owl-carousel">
                        @foreach ($newProducts as $products)
                        <div class="latest-prdouct__slider__item">
                            @foreach ($products as $product)
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{ $product->images->count() > 0 ? asset('storage/'.$product->images->first()->full) : '' }}"
                                        alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>{{ $product->name }}</h6>
                                    <span>{{ config('settings.currency_symbol') . $product->price }}</span>
                                </div>
                            </a>
                            @endforeach
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>{{ __('Top Rated Products') }}</h4>
                    <div class="latest-product__slider owl-carousel">
                        @foreach ($newProducts as $products)
                        <div class="latest-prdouct__slider__item">
                            @foreach ($products as $product)
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{ $product->images->count() > 0 ? asset('storage/'.$product->images->first()->full) : '' }}"
                                        alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>{{ $product->name }}</h6>
                                    <span>{{ config('settings.currency_symbol') . $product->price }}</span>
                                </div>
                            </a>
                            @endforeach
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>{{ __('Review Products') }}</h4>
                    <div class="latest-product__slider owl-carousel">
                        @foreach ($newProducts as $products)
                        <div class="latest-prdouct__slider__item">
                            @foreach ($products as $product)
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{ $product->images->count() > 0 ? asset('storage/'.$product->images->first()->full) : '' }}"
                                        alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>{{ $product->name }}</h6>
                                    <span>{{ config('settings.currency_symbol') . $product->price }}</span>
                                </div>
                            </a>
                            @endforeach
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Latest Product Section End -->
@endsection
