@extends('site.app')
@section('title',"Favorite")

@section('content')

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{ asset('img/breadcrumb.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Favorite</h2>
                    <div class="breadcrumb__option">
                        <a href="{{ route('home') }}">Home</a>
                        <span>Favorite Products</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<div class="container">
    <div class="filter__item">
        <div class="row">
            <div class="col-md-12">
                <div class="filter__found">
                    <h6><span>{{ $products->count() }}</span> Products found</h6>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach ($products as $product)
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="product__item">
                <div class="product__item__pic set-bg"
                    data-setbg="{{ $product->images->count() > 0 ? asset('storage/'.$product->images->first()->full) : '' }}">
                    <ul class="product__item__pic__hover">
                        <li><a href="{{ route('product.show',$product->slug) }}"><i class="fa fa-eye"></i></a></li>
                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                    </ul>
                </div>
                <div class="product__item__text">
                    <h6><a href="{{ route('product.show',$product->slug) }}">{{ Str::ucfirst($product->name) }}</a></h6>
                    <h5>{{ config('settings.currency_symbol').$product->price }}</h5>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="product__pagination">
        <a href="#">1</a>
        <a href="#">2</a>
        <a href="#">3</a>
        <a href="#"><i class="fa fa-long-arrow-right"></i></a>
    </div>
</div>
@endsection
