@extends('site.app')
@section('title',"Checkout")

@section('content')

<!--========================== Start Home Banner Area =================================-->

<section class="banner-area">
    <div class="container">
        <div class="banner-content">
            <div class="banner-title float-left">
                <h2>Checkout</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
            <div class="banner-links float-right">
                <a class="item-link" href="">Home</a>
                <a class="item-link" href="">Checkout</a>
            </div>
        </div>
    </div>
</section>


<!--========================== End Home Banner Area =================================-->

<!--========================== Start Checkout Area =================================-->


<section class="checkout-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                @if (Session::has('error'))
                <p class="alert alert-danger">{{ Session::get('error') }}</p>
                @endif
            </div>
        </div>
        <form action="{{ route('checkout.place.order') }}" method="POST" role="form">
            <div class="row">
                <div class="col-md-8">
                    <h4>billing details</h4>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="firstName">first name <span>*</span></label>
                            <input class="form-control" placeholder="Enter your First Name" type="text" name="firstName"
                                id="firstName">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="lastName">last name <span>*</span></label>
                            <input class="form-control" type="text" placeholder="Enter your Last Name" name="lastName"
                                id="lastName">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="phoneNumber">phone Number <span>*</span></label>
                            <input class="form-control" type="text" placeholder="Enter your Phone Number"
                                name="phoneNumber" id="phoneNumber">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="email">Email address<span>*</span></label>
                            <input class="form-control" type="text" placeholder="Enter your Email Address" name="email"
                                id="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="country">country <span>*</span></label>
                        <select class="form-control" name="country">
                            <option selected>country</option>
                            <option value="morocco">morocco</option>
                            <option value="france">france</option>
                            <option value="canda">canda</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="address01">address line 01 <span>*</span></label>
                        <input class="form-control" placeholder="Enter your Address line 01" type="text"
                            name="address01" id="address01">
                    </div>
                    <div class="form-group">
                        <label for="address02">address line 02 <span>*</span></label>
                        <input class="form-control" type="text" placeholder="Enter your Address line 02"
                            name="address02" id="address02">
                    </div>
                    <div class="form-group">
                        <label for="twon-city">town / city <span>*</span></label>
                        <input class="form-control" type="text" placeholder="Enter your Town / City" name="city"
                            id="city">
                    </div>
                    <div class="form-group">
                        <label for="postCode">Postcode / zip</label>
                        <input class="form-control" type="text" placeholder="Enter your Postcode / Zip" name="postCode"
                            id="postCode">
                    </div>
                    <div class="form-group">
                        <label for="orderNotes">order notes</label>
                        <textarea class="form-control" name="orderNotes" id="orderNotes">
                        </textarea>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="order-place">
                        <h4>your order</h4>
                        <div class="row order-item-title">
                            <div class="col-md-5">
                                <span class="product">Product</span>
                            </div>
                            <div class="col-md-4">
                                <span class="qty">Qty</span>
                            </div>
                            <div class="col-md-3">
                                <span class="total">Total</span>
                            </div>
                        </div>
                        @foreach (Cart::getContent() as $item)
                        <div class="row order-item">
                            <div class="col-md-5">
                                <span class="product-name">{{ $item->name }}</span>
                            </div>
                            <div class="col-md-4">
                                <span class="product-qty">x {{ $item->quantity }}</span>
                            </div>
                            <div class="col-md-3">
                                <span class="product-total">$720.00</span>
                            </div>
                        </div>
                        @endforeach
                        <div class="row order-item">
                            <div class="col-md-6">
                                <span class="sub-total">Subtotal</span>
                            </div>
                            <div class="col-md-6">
                                <span class="s-total">$720.00</span>
                            </div>
                        </div>
                        <div class="row order-item">
                            <div class="col-md-6">
                                <span class="shipping">Shipping</span>
                            </div>
                            <div class="col-md-6">
                                <span class="p-shipping">$720.00</span>
                            </div>
                        </div>
                        <div class="row order-item">
                            <div class="col-md-6">
                                <span class="total">Total</span>
                            </div>
                            <div class="col-md-6">
                                <span
                                    class="p-total">{{ config('settings.currency_symbol') }}{{ \Cart::getSubTotal() }}</span>
                            </div>
                        </div>
                        <div class="row order-item">
                            <div class="col-md-8">
                                <input placeholder="Enter Coupon Code" class="form-control" type="text"
                                    name="couponCode" id="couponCode" />
                            </div>
                            <div class="col-md-4">
                                <button class="d-btn btn c-btn">Apply</button>
                            </div>
                        </div>

                        <label for="terms" class="terms">
                            <input id="terms" name="terms" type="checkbox" />
                            I've Read And Accept The <a href="">terms & conditions *</a>
                        </label>
                        <button type="submit" class="g-btn btn p-checkout-btn">place order</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>


<!--========================== End Checkout Area =================================-->
@endsection
@push('styles')
<link rel="stylesheet" href="{{ asset("frontend/css/checkout.css") }}">
@endpush
