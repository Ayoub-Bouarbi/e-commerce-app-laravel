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
            <div class="col-md-9">
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
                                <tr>
                                    <td>
                                        <figure class="media">
                                            <div class="img-wrap">
                                                <img src="./img/product/single-product/s-product-1.jpg" alt="">
                                            </div>
                                            <figcaption class="media-content">
                                                <h5>Product Name Goes Here</h5>
                                                <p><span>Size :</span> XXL</p>
                                                <p><span>Color :</span> Orange Color</p>
                                            </figcaption>
                                        </figure>
                                    </td>
                                    <td class="qty">
                                        <input type="number" name="qty" min="1" value="1" id="qty" />
                                    </td>
                                    <td class="price">
                                        <span>$145</span>
                                        <span>($5 each)</span>
                                    </td>
                                    <td>
                                        <button class="g-btn"><i class="fa fa-heart"></i></button>
                                        <button class="r-btn"><i class="fa fa-close"></i> Remove</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <figure class="media">
                                            <div class="img-wrap">
                                                <img src="./img/product/single-product/s-product-1.jpg" alt="">
                                            </div>
                                            <figcaption class="media-content">
                                                <h5>Product Name Goes Here</h5>
                                                <p><span>Size :</span> XXL</p>
                                                <p><span>Color :</span> Orange Color</p>
                                            </figcaption>
                                        </figure>
                                    </td>
                                    <td class="qty">
                                        <input type="number" name="qty" min="1" value="1" id="qty" />
                                    </td>
                                    <td class="price">
                                        <span>$145</span>
                                        <span>($5 each)</span>
                                    </td>
                                    <td>
                                        <button class="g-btn"><i class="fa fa-heart"></i></button>
                                        <button class="r-btn"><i class="fa fa-close"></i> Remove</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <figure class="media">
                                            <div class="img-wrap">
                                                <img src="./img/product/single-product/s-product-1.jpg" alt="">
                                            </div>
                                            <figcaption class="media-content">
                                                <h5>Product Name Goes Here</h5>
                                                <p><span>Size :</span> XXL</p>
                                                <p><span>Color :</span> Orange Color</p>
                                            </figcaption>
                                        </figure>
                                    </td>
                                    <td class="qty">
                                        <input type="number" name="qty" min="1" value="1" id="qty" />
                                    </td>
                                    <td class="price">
                                        <span>$145</span>
                                        <span>($5 each)</span>
                                    </td>
                                    <td>
                                        <button class="g-btn"><i class="fa fa-heart"></i></button>
                                        <button class="r-btn"><i class="fa fa-close"></i> Remove</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <button class="g-btn c-shopping">Continue Shopping</button>
            </div>
            <div class="col-md-3">
                <aside class="p-checkout">
                    <p>
                        Add USD 5.00 of eligible items to your order to qualify for FREE Shipping.
                    </p>
                    <div class="price">
                        <p>Total Price : <span>$580</span></p>
                        <p>Discount : <span>$600</span></p>
                        <p>Total : <span>$1200</span></p>
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
                    <button class="g-btn p-checkout-btn">Proceed to checkout</button>
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