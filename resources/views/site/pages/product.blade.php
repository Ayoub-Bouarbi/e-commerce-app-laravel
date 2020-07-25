@extends('site.app')
@section('title',"Product Detail")

@section('content')

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{ asset('img/breadcrumb.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>{{ Str::ucfirst($product->name) }}</h2>
                    <div class="breadcrumb__option">
                        <a href="{{ route('home') }}">
                            {{ __('Home') }}
                        </a>
                        <a href="{{ route('category.show',$product->category->slug) }}">
                            {{ Str::ucfirst($product->category->name) }}
                        </a>
                        <span>{{ Str::ucfirst($product->name) }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Details Section Begin -->
<section class="product-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__item">
                        <img class="product__details__pic__item--large"
                            src="{{ $product->images->count() > 0 ? asset('storage/'.$product->images->first()->full) : '' }}"
                            alt="">
                    </div>
                    <div class="product__details__pic__slider owl-carousel">
                        @if ($product->images->count() > 0)
                            @foreach ($product->images as $image)
                                <img data-imgbigurl="{{ asset('storage/'.$image->full) }}"
                                    src="{{ asset('storage/'.$image->full) }}" alt="">
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product__details__text">
                    <h3>{{ Str::ucfirst($product->name) }}</h3>
                    <div class="product__details__rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                        <span>(18 {{ __('Reviews') }})</span>
                    </div>
                    @if ($product->sale_price > 0)
                        <var class="product__details__price">
                            <span class="currency">{{ config('settings.currency_symbol') }}</span>
                            <span class="num" id="productPrice">{{ $product->sale_price }}</span>
                            <del class="price-old"> {{ config('settings.currency_symbol') }}{{ $product->price }}</del>
                        </var>
                    @else
                        <div class="product__details__price">
                            <span class="currency">{{ config('settings.currency_symbol') }}</span>
                            <span class="num" id="productPrice">{{ $product->price }}</span>
                        </div>
                    @endif
                    <p>
                        {{ $product->description }}
                    </p>
                    <form action="{{ route('product.add.cart') }}" method="post">
                        @csrf
                        <div class="row" style="margin-bottom: 20px">
                            @foreach($attributes as $attribute)
                            <div class="col-md-6">
                                @php $attributeCheck = in_array($attribute->id,
                                $product->attributes->pluck('attribute_id')->toArray()) @endphp
                                @if ($attributeCheck)
                                <dt>{{ $attribute->name }}: </dt>
                                <dd>
                                    <select class="form-control form-control-sm option" style="width:180px;"
                                        name="{{ strtolower($attribute->name ) }}">
                                        <option data-price="0" value="0"> Select a {{ $attribute->name }}</option>
                                        @foreach($product->attributes as $attributeValue)
                                            @if ($attributeValue->attribute_id == $attribute->id)
                                            <option data-price="{{ $attributeValue->price }}"
                                                value="{{ $attributeValue->value }}">
                                                {{ ucwords($attributeValue->value . ' +'. $attributeValue->price) }}
                                            </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </dd>
                                @endif
                            </div>
                            @endforeach
                        </div>
                        <div class="product__details__quantity">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="text" name="qty" id="qty" value="1">
                                    <input type="hidden" name="productId" value="{{ $product->id }}">
                                    <input type="hidden" name="price" id="finalPrice" value="{{ $product->sale_price != '' ? $product->sale_price : $product->price }}">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="site-btn">{{ __('ADD TO CARD') }}</button>
                        <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                    </form>
                    <ul>
                        <li><b>{{ __('Availability') }}</b> <span>{{ __('In Stock') }}</span></li>
                        <li><b>{{ __('Shipping') }}</b> <span>{{ __('03 day shipping.') }}<samp>{{ __('Free Pickup Today') }}</samp></span></li>
                        <li><b>{{ __('Weight') }}</b> <span>{{ $product->weight }} kg</span></li>
                        <li><b>{{ __('SKU') }}</b> <span>{{ $product->sku }}</span></li>
                        <li><b>{{ __('Share on') }}</b>
                            <div class="share">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                aria-selected="true">{{ __('Description') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"
                                aria-selected="false">{{ __('Information') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                                aria-selected="false">{{ __('Reviews') }} <span>(1)</span></a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>{{ __('Products Infomation') }}</h6>
                                <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
                                    Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus. Vivamus
                                    suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam sit amet quam
                                    vehicula elementum sed sit amet dui. Donec rutrum congue leo eget malesuada.
                                    Vivamus suscipit tortor eget felis porttitor volutpat. Curabitur arcu erat,
                                    accumsan id imperdiet et, porttitor at sem. Praesent sapien massa, convallis a
                                    pellentesque nec, egestas non nisi. Vestibulum ac diam sit amet quam vehicula
                                    elementum sed sit amet dui. Vestibulum ante ipsum primis in faucibus orci luctus
                                    et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam
                                    vel, ullamcorper sit amet ligula. Proin eget tortor risus.</p>
                                <p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Lorem
                                    ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit aliquet
                                    elit, eget tincidunt nibh pulvinar a. Cras ultricies ligula sed magna dictum
                                    porta. Cras ultricies ligula sed magna dictum porta. Sed porttitor lectus
                                    nibh. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.
                                    Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed
                                    porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum
                                    sed sit amet dui. Proin eget tortor risus.</p>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-2" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>{{ __('Products Infomation') }}</h6>
                                <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
                                    Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus.
                                    Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam
                                    sit amet quam vehicula elementum sed sit amet dui. Donec rutrum congue leo
                                    eget malesuada. Vivamus suscipit tortor eget felis porttitor volutpat.
                                    Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Praesent
                                    sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ac
                                    diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante
                                    ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
                                    Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.
                                    Proin eget tortor risus.</p>
                                <p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Lorem
                                    ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit aliquet
                                    elit, eget tincidunt nibh pulvinar a. Cras ultricies ligula sed magna dictum
                                    porta. Cras ultricies ligula sed magna dictum porta. Sed porttitor lectus
                                    nibh. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.</p>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-3" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>{{ __('Products Infomation') }}</h6>
                                <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
                                    Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus.
                                    Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam
                                    sit amet quam vehicula elementum sed sit amet dui. Donec rutrum congue leo
                                    eget malesuada. Vivamus suscipit tortor eget felis porttitor volutpat.
                                    Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Praesent
                                    sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ac
                                    diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante
                                    ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
                                    Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.
                                    Proin eget tortor risus.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Details Section End -->

<!-- Related Product Section Begin -->
<section class="related-product">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title related__product__title">
                    <h2>{{ __('Related Product') }}</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @forelse ($relatedProduct as $product)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="{{ $product->images->first()->full }}">
                        <ul class="product__item__pic__hover">
                            <li><a href="{{ route('product.show',$product->slug) }}"><i class="fa fa-eye"></i></a></li>
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6><a href="{{ route('product.show',$product->slug) }}">{{ $product->name }}</a></h6>
                        <h5>{{ config('settings.currency_symbol').$product->price }}</h5>
                    </div>
                </div>
            </div>
            @empty
                <p>{{ __('No Related Product Exist') }}</p>
            @endforelse
        </div>
    </div>
</section>
<!-- Related Product Section End -->
@endsection
@push('scripts')
    <script>
        $(document).ready(function () {
            $('#addToCart').submit(function (e) {
                if ($('.option').val() == 0) {
                    e.preventDefault();
                    alert('Please select an option');
                }
            });
            $('.option').change(function () {
                $('#productPrice').html("{{ $product->sale_price != '' ? $product->sale_price : $product->price }}");
                let extraPrice = $(this).find(':selected').data('price');
                let price = parseFloat($('#productPrice').html());
                let finalPrice = (Number(extraPrice) + price).toFixed(2);
                $('#finalPrice').val(finalPrice);
                $('#productPrice').html(finalPrice);
            });
        });
    </script>
@endpush
