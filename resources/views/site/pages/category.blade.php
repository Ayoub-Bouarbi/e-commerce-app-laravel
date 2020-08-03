@extends('site.app')
@section('title',"Shop")

@section('content')

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{ asset('img/breadcrumb.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>{{ __('Organi Shop') }}</h2>
                    <div class="breadcrumb__option">
                        <a href="{{ route('home') }}">{{ __('Home') }}</a>
                        <span>{{ __('Shop') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    <div class="sidebar__item">
                        <h4>{{ __('Department') }}</h4>
                        <ul>
                            @foreach ($categories as $cat)
                                @foreach ($cat->items as $category)
                                    <li>
                                        <a href="{{ route('category.show', $category->slug) }}">{{ Str::ucfirst($category->name) }}</a>
                                    </li>
                                @endforeach
                            @endforeach
                        </ul>
                    </div>
                    <div class="sidebar__item sidebar__item__color--option">
                        <h4>{{ __('Colors') }}</h4>
                        @foreach ($attributes as $attribute)
                            @if($attribute->name == "Color")
                            <form id="frm_color" action="{{ route('category.showAttribute') }}" method="POST">
                                @csrf
                                @foreach ($attribute->values as $value)
                                    <div class="sidebar__item__color sidebar__item__color--{{ $value->value }}">
                                        <label onclick="document.getElementById('frm_color').submit();" for="{{ $value->value }}">
                                            {{ Str::ucfirst($value->value) }}
                                            <input type="radio" name="attribute" id="{{ $value->value }}" value="{{ $value->value }}">
                                        </label>
                                    </div>
                                @endforeach
                            </form>
                            @endif
                        @endforeach
                    </div>
                    <div class="sidebar__item">
                        <h4>{{ __('Popular Size') }}</h4>
                        @foreach ($attributes as $attribute)
                            @if ($attribute->name == "Size")
                            <form id="frm_size" action="{{ route('category.showAttribute') }}" method="POST">
                                @csrf
                                @foreach ($attribute->values as $value)
                                    <div class="sidebar__item__size">
                                        <label onclick="document.getElementById('frm_size').submit();" for="{{ $value->value }}">
                                            {{ Str::ucfirst($value->value) }}
                                            <input type="radio" name="attribute" id="{{ $value->value }}" value="{{ $value->value }}">
                                        </label>
                                    </div>
                                @endforeach
                            </form>
                           @endif
                        @endforeach
                    </div>
                    <div class="sidebar__item">
                        <div class="latest-product__text">
                            <h4>{{ __('Latest Products') }}</h4>
                            <div class="latest-product__slider owl-carousel">
                                @foreach ($newProducts as $prod)
                                <div class="latest-prdouct__slider__item">
                                    @foreach ($prod as $product)
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{ $product->images->count() > 0 ? asset('storage/'.$product->images->first()->full) : '' }}" alt="">
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
            <div class="col-lg-9 col-md-7">
                <div class="product__discount">
                    <div class="section-title product__discount__title">
                        <h2>{{ __('Sale Off') }}</h2>
                    </div>
                    <div class="row">
                        <div class="product__discount__slider owl-carousel">
                            @foreach ($products as $product)
                                @if ($product->sale_price > 0)
                                    <div class="col-lg-4">
                                        <div class="product__discount__item">
                                            <div class="product__discount__item__pic set-bg"
                                                data-setbg="{{ asset('storage/'.$product->images->first()->full) }}">
                                                <div class="product__discount__percent">-20%</div>
                                                <ul class="product__item__pic__hover">
                                                    <li><a href="{{ route('product.show',$product->slug) }}"><i class="fa fa-eye"></i></a></li>
                                                    <li><a href="{{ route('favorite.add') }}"><i class="fa fa-heart"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="product__discount__item__text">
                                                <span>{{ Str::ucfirst($product->category->name) }}</span>
                                                <h5><a href="{{ route('product.show',$product->slug) }}">{{ Str::ucfirst($product->name) }}</a></h5>
                                                <div class="product__item__price">{{ config('settings.currency_symbol') . $product->sale_price }} <span>{{ config('settings.currency_symbol') . $product->price }}</span></div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="filter__item">
                    <div class="row">
                        <div class="col-lg-4 col-md-5">
                            <form id="frm_sort" method="POST" action="{{ route('category.sort') }}" class="filter__sort">
                                @csrf
                                <span>{{ __('Sort By') }}</span>
                                <select name="sort" onchange="document.getElementById('frm_sort').submit();">
                                    <option value="">default</option>
                                    <option value="name">Name</option>
                                    <option value="price">Price</option>
                                </select>
                            </form>
                        </div>
                        <div class="col-lg-8 col-md-5">
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
                            <div class="product__item__pic set-bg" data-setbg="{{ $product->images->count() > 0 ? asset('storage/'.$product->images->first()->full) : '' }}">
                                <ul class="product__item__pic__hover">
                                    <li><a href="{{ route('product.show',$product->slug) }}"><i class="fa fa-eye"></i></a></li>
                                    <li><a href="{{ route('favorite.add',$product->id) }}"><i class="fa fa-heart"></i></a></li>
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
        </div>
    </div>
</section>
<!-- Product Section End -->

@endsection
