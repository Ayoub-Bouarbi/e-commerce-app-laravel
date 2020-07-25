@extends('site.app')

@section('title',"Cart")

@section('content')

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Shopping Cart</h2>
                    <div class="breadcrumb__option">
                        <a href="{{ route('home') }}">Home</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                @if (Session::has('message'))
                <p class="alert alert-success">{{ Session::get('message') }}</p>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                @if (Cart::isEmpty())
                <p class="alert alert-warning">Your shopping cart is empty.</p>
                @else
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Products</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (Cart::getContent() as $item)
                            <tr>
                                <td class="shoping__cart__item">
                                    @if ($item->associatedModel->images->count() > 0)
                                    <img src="{{ asset('storage/'.$item->associatedModel->images->first()->full) }}" alt="">                                        
                                    @endif
                                    <h5>{{ Str::ucfirst($item->name) }}</h5>
                                </td>
                                <td class="shoping__cart__price">
                                    {{ config('settings.currency_symbol') . $item->price }}
                                </td>
                                <td class="shoping__cart__quantity">
                                    <form id="frm" action="{{ route('product.update.cart') }}" method="post">
                                        @csrf
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" name="qty" value="{{ $item->quantity }}">
                                                <input type="text" hidden name="cartId" value="{{ $item->id }}">
                                            </div>
                                        </div>
                                    </form>
                                </td>
                                <td class="shoping__cart__total">
                                    $110.00
                                </td>
                                <td class="shoping__cart__item__close">
                                    <a href="{{ route('checkout.cart.remove',$item->id) }}" class="icon_close"></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <a href="{{ route('category.index') }}" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                    <button class="site-btn primary-btn cart-btn cart-btn-right" onclick="document.getElementById('frm').submit()"><span class="icon_loading"></span> Upadate Cart</button>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__continue">
                    <div class="shoping__discount">
                        <h5>Discount Codes</h5>
                        <form action="#">
                            <input type="text" placeholder="Enter your coupon code">
                            <button type="submit" class="site-btn">APPLY COUPON</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Cart Total</h5>
                    <ul>
                        <li>Subtotal <span>{{ config('settings.currency_symbol') . Cart::getSubTotal() }}</span></li>
                        <li>Total <span>{{ config('settings.currency_symbol') . Cart::getTotal() }}</span></li>
                    </ul>
                    <a href="{{ route('checkout.index') }}" class="primary-btn">PROCEED TO CHECKOUT</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shoping Cart Section End -->
@endsection

@push('scripts')
    <script>
        
    </script>
@endpush
