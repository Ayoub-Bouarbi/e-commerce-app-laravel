@extends('site.app')
@section('title',"Cart")
@section('content')

<!--========================== Start Home Banner Area =================================-->

<section class="banner-area">
    <div class="container">
        <div class="banner-content">
            <div class="banner-title float-left">
                <h2>Cart</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
            <div class="banner-links float-right">
                <a class="item-link" href="">Home</a>
                <a class="item-link" href="">Cart</a>
            </div>
        </div>
    </div>
</section>


<!--========================== End Home Banner Area =================================-->

<!--========================== Start Cart Banner Area =================================-->

<section class="cart-banner-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                @if (Session::has('message'))
                    <p class="alert alert-success">{{ Session::get('message') }}</p>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-9">
                @if (\Cart::isEmpty())      
                    <p class="alert alert-warning">Your shopping cart is empty.</p>
                @else
                <div class="card">
                    <div class="table-responsive ">
                        <table class="table table-hover w-100">
                            <thead class="t-head text-muted">
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="t-body">
                                @foreach (\Cart::getContent() as $item)        
                                <tr>
                                    <td>
                                        <figure class="media">
                                            <div class="img-wrap">
                                                @if (!empty($item->image))
                                                    <img src="{{ asset('storage/'.$item->image) }}" alt="">
                                                @else
                                                    <img src="{{ asset('img/product/single-product/s-product-1.jpg') }}" alt="">
                                                @endif
                                            </div>
                                            <figcaption class="media-content">
                                                <h5>{{ $item->name }}</h5>
                                                @foreach ($item->attributes as $key => $value)
                                                    <p>
                                                        <span>{{ $key }} :</span> {{ $value }}
                                                    </p>
                                                @endforeach
                                            </figcaption>
                                        </figure>
                                    </td>
                                    <td class="qty">
                                        <span class="qty">{{ $item->quantity  }}</span>
                                    </td>
                                    <td class="price">
                                        <span>{{ config('settings.currency_symbol'). $item->price }} each</span>
                                    </td>
                                    <td>
                                        <button class="g-btn"><i class="fa fa-heart"></i></button>
                                        <a href="{{ route('checkout.cart.remove', $item->id) }}" class="r-btn"><i class="fa fa-close"></i> Remove</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @endif
                <a href="{{ route('category.index') }}" class="g-btn c-shopping">Continue Shopping</a>
            </div>
            <div class="col-md-3">
                <aside class="p-checkout">
                    <p>
                        Add USD 5.00 of eligible items to your order to qualify for FREE Shipping.
                    </p>
                    <div class="price">
                        <p>Total Price : <span>$1321</span></p>
                        <p>Discount : <span>$600</span></p>
                        <p>Total : <span>{{ config('settings.currency_symbol') }}{{ \Cart::getSubTotal() }}</span></p>
                    </div>
                    <hr>
                    <div>
                        <figure class="itemside mb-3">
                            <aside>
                                <img src="./img/pay-visa.png" alt="pay visa" />
                            </aside>
                            <div class="text-wrap small text-muted ml-2">
                                Pay 84.78 AED ( Save 14.97 AED ) By using ADCB Cards
                            </div>
                        </figure>
                        <figure class="itemside mb-3">
                            <aside>
                                <img src="./img/pay-mastercard.png" alt="pay visa" />
                            </aside>
                            <div class="text-wrap small text-muted ml-2">
                                Pay by MasterCard and Save 40%.
                                Lorem ipsum dolo
                            </div>
                        </figure>
                    </div>
                    <a href="#" class="g-btn p-checkout-btn">Proceed to checkout</a>
                </aside>
            </div>
        </div>
    </div>
</section>

<!--========================== End Cart Banner Area =================================-->
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset("frontend/css/cart.css") }}">
@endpush