@extends('site.app')
@section('title',"Home")

@section('content')
<!--========================== Start Home Banner Area =================================-->
<section class="home-banner">
    <div class="container">
        <div class="banner-content">
            <p>men collection</p>
            <h1><span>show</span> your</br> personal <span>style</span></h1>
            <p>fwol saw dry which a above together place</p>
            <button class="g-btn">view collection</button>
        </div>
    </div>
</section>
<!--========================== End Home Banner Area =================================-->

<!--========================== Start Feautre Area =================================-->
<section class="feature-area">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-3">
                <div class="feature-item">
                    <i class="fa fa-money"></i>
                    <h5>Moeny back gurantee</h5>
                    <p>shall open divide a one</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="feature-item">
                    <i class="fa fa-truck"></i>
                    <h5>Free Delivery</h5>
                    <p>shall open divide a one</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="feature-item">
                    <i class="fa fa-support"></i>
                    <h5>alway support</h5>
                    <p>shall open divide a one</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="feature-item">
                    <i class="fa fa-shield"></i>
                    <h5>secure payment</h5>
                    <p>shall open divide a one</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--========================== End Feature Area =================================-->

<!--========================== Start Feature Product Area =================================-->
<section class="feature-product-area">
    <div class="container">
        <div class="main-title">
            <h2>Featured Products</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="product-item">
                    <div class="product-img">
                        <img src="" alt="img">
                        <div class="product-links">
                            <a href="#" class="item-link"><i class="fa fa-eye"></i></a>
                            <a href="#" class="item-link"><i class="fa fa-heart"></i></a>
                            <a href="#" class="item-link"><i class="fa fa-shopping-cart"></i></a>
                        </div>
                    </div>
                    <div class="product-content">
                        {{-- <h5>{{ $product->name }}</h5> --}}
                        {{-- <span>{{ config("settings.currency_code") + $product->price }}</span> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--========================== End Feature Product Area =================================-->

<!--========================== Start New Product Area =================================-->
<section class="new-product-area">
    <div class="container">
        <div class="main-title">
            <h2>New Products</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        </div>

        <div class="row">
            <row class="col-lg-6">
                <div class="new-product-item">
                    <div class="new-product-content">
                        <h4>collection of 2019</h4>
                        <h2>men's summer t-shirt</h2>
                    </div>
                    <div class="new-product-img">
                        <img src="./img/product/new-product/new-product1.png" alt="img" />
                    </div>
                    <div class="new-product-price">
                        <span>
                            $120.70
                        </span>
                        <button class="g-btn">
                            Add to cart
                        </button>
                    </div>
                </div>
            </row>
            <row class="col-lg-6">
                <div class="row">
                    <div class="col-md-6">
                        <div class="product-item">
                            <div class="product-img">
                                <img src="./img/product/new-product/n1.jpg" alt="img">
                                <div class="product-links">
                                    <a class="item-link"><i class="fa fa-eye"></i></a>
                                    <a class="item-link"><i class="fa fa-heart"></i></a>
                                    <a class="item-link"><i class="fa fa-shopping-cart"></i></a>
                                </div>
                            </div>
                            <div class="product-content">
                                <h5>nike latest sneaker</h5>
                                <span>$25.00</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product-item">
                            <div class="product-img">
                                <img src="./img/product/new-product/n2.jpg" alt="img">
                                <div class="product-links">
                                    <a class="item-link"><i class="fa fa-eye"></i></a>
                                    <a class="item-link"><i class="fa fa-heart"></i></a>
                                    <a class="item-link"><i class="fa fa-shopping-cart"></i></a>
                                </div>
                            </div>
                            <div class="product-content">
                                <h5>men's denim jeans</h5>
                                <span>$25.00</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product-item">
                            <div class="product-img">
                                <img src="./img/product/new-product/n3.jpg" alt="img">
                                <div class="product-links">
                                    <a class="item-link"><i class="fa fa-eye"></i></a>
                                    <a class="item-link"><i class="fa fa-heart"></i></a>
                                    <a class="item-link"><i class="fa fa-shopping-cart"></i></a>
                                </div>
                            </div>
                            <div class="product-content">
                                <h5>quartz hand watch</h5>
                                <span>$25.00</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product-item">
                            <div class="product-img">
                                <img src="./img/product/new-product/n4.jpg" alt="img">
                                <div class="product-links">
                                    <a class="item-link"><i class="fa fa-eye"></i></a>
                                    <a class="item-link"><i class="fa fa-heart"></i></a>
                                    <a class="item-link"><i class="fa fa-shopping-cart"></i></a>
                                </div>
                            </div>
                            <div class="product-content">
                                <h5>adidas sport shoes</h5>
                                <span>$25.00</span>
                            </div>
                        </div>
                    </div>
                </div>
            </row>
        </div>
    </div>
</section>
<!--========================== End New Product Area =================================-->
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset("frontend/css/main.css") }}">
@endpush