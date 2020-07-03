@extends('site.app')
@section('title',"Product Details")
@section('content')

<!--========================== Start Home Banner Area =================================-->

<section class="banner-area">
    <div class="container">
        <div class="banner-content">
            <div class="banner-title float-left">
                <h2>Product Details</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
            <div class="banner-links float-right">
                <a class="item-link" href="">Home</a>
                <a class="item-link" href="">Product Details</a>
            </div>
        </div>
    </div>
</section>


<!--========================== End Home Banner Area =================================-->

<!--========================== End Product Details Area =================================-->

<section class="product-detail-area">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="product-img">
                    <img src="./img/product/single-product/s-product-1.jpg" alt="Product Image" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="product-detail-content">
                    <h3>Thoshiba</h3>
                    <h1>Faded Sky Blue Denim Jeans</h1>
                    <span>$179.99</span>
                    <p>Category : <a href="#">Household</a></p>
                    <p>Availivility : <span>In Stock</span></p>
                    <hr />
                    <p>
                        Mill Oil is an innovative oil filled radiator with the most modern technology. If you are
                        looking for something that can make your interior look awesome, and at the same time give
                        you the pleasant warm feeling during the winter.
                    </p>
                    <div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <select class="form-control" name="size" id="size">
                                        <option value="x">Size : X</option>
                                        <option value="xl">Size : XL</option>
                                        <option value="m">Size : M</option>
                                        <option value="s">Size : S</option>
                                    </select>
                                </div>
                                <div class="col-md-6">

                                    <select class="form-control" name="size" id="size">
                                        <option value="White">Color : White</option>
                                        <option value="Black">Color : Black</option>
                                        <option value="Red">Color : Red</option>
                                        <option value="Blue">Color : Blue</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Quantity : </label>
                            <input type="number" class="form-control" name="qty" min="1" value="1" id="qty" />
                        </div>
                    </div>

                    <button class="g-btn">Add to cart</button>
                    <button class="heart-btn"><i class="fa fa-heart"></i></button>
                </div>
            </div>
        </div>
        <div class="product-description-area">
            <div class="tab-links">
                <button class="tab-link" onclick="OpenTab(event,'description')">Description</button>
                <button class="tab-link" onclick="OpenTab(event,'specification')">Specification</button>
            </div>
            <div class="tabcontent" id="description">
                <p>
                    Beryl Cook is one of Britain’s most talented and amusing artists .Beryl’s pictures feature women
                    of all shapes and sizes enjoying themselves .Born between the two world wars, Beryl Cook
                    eventually left Kendrick School in Reading at the age of 15, where she went to secretarial
                    school and then into an insurance office. After moving to London and then Hampton, she
                    eventually married her next door neighbour from Reading, John Cook. He was an officer in the
                    Merchant Navy and after he left the sea in 1956, they bought a pub for a year before John took a
                    job in Southern Rhodesia with a motor company. Beryl bought their young son a box of
                    watercolours, and when showing him how to use it, she decided that she herself quite enjoyed
                    painting. John subsequently bought her a child’s painting set for her birthday and it was with
                    this that she produced her first significant work, a half-length portrait of a dark-skinned lady
                    with a vacant expression and large drooping breasts. <br>
                    It was aptly named ‘Hangover’ by Beryl’s husband and
                    It is often frustrating to attempt to plan meals that are designed for one. Despite this fact,
                    we are seeing more and more recipe books and Internet websites that are dedicated to the act of
                    cooking for one. Divorce and the death of spouses or grown children leaving for college are all
                    reasons that someone accustomed to cooking for more than one would suddenly need to learn how to
                    adjust all the cooking practices utilized before into a streamlined plan of cooking that is more
                    efficient for one person creating less</p>
            </div>
            <div class="tabcontent" id="specification">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Width</td>
                                <td>128mm</td>
                            </tr>
                            <tr>
                                <td>Height</td>
                                <td>508mm</td>
                            </tr>
                            <tr>
                                <td>Depth</td>
                                <td>85mm</td>
                            </tr>
                            <tr>
                                <td>Weight</td>
                                <td>52gm</td>
                            </tr>
                            <tr>
                                <td>Quality Checking</td>
                                <td>Yes</td>
                            </tr>
                            <tr>
                                <td>Freshness Duration</td>
                                <td>03 Days</td>
                            </tr>
                            <tr>
                                <td>When Packeting</td>
                                <td>Without Touch of Hand</td>
                            </tr>
                            <tr>
                                <td>Each Box Contains</td>
                                <td>60pcs</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>


<!--========================== End Product Details Area =================================-->


<!--========================== Start Related Product Area =================================-->


<section class="related-product">
    <div class="container">
        <div class="title">
            <h1>Related Product</h1>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="product-item">
                    <div class="product-img">
                        <img src="./img/product/feature-product/f-p-3.jpg" alt="img">
                        <div class="product-links">
                            <a class="item-link"><i class="fa fa-eye"></i></a>
                            <a class="item-link"><i class="fa fa-heart"></i></a>
                            <a class="item-link"><i class="fa fa-shopping-cart"></i></a>
                        </div>
                    </div>
                    <div class="product-content">
                        <h5>men stylist smart watch</h5>
                        <span>$25.00</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="product-item">
                    <div class="product-img">
                        <img src="./img/product/feature-product/f-p-3.jpg" alt="img">
                        <div class="product-links">
                            <a class="item-link"><i class="fa fa-eye"></i></a>
                            <a class="item-link"><i class="fa fa-heart"></i></a>
                            <a class="item-link"><i class="fa fa-shopping-cart"></i></a>
                        </div>
                    </div>
                    <div class="product-content">
                        <h5>men stylist smart watch</h5>
                        <span>$25.00</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="product-item">
                    <div class="product-img">
                        <img src="./img/product/feature-product/f-p-3.jpg" alt="img">
                        <div class="product-links">
                            <a class="item-link"><i class="fa fa-eye"></i></a>
                            <a class="item-link"><i class="fa fa-heart"></i></a>
                            <a class="item-link"><i class="fa fa-shopping-cart"></i></a>
                        </div>
                    </div>
                    <div class="product-content">
                        <h5>men stylist smart watch</h5>
                        <span>$25.00</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="product-item">
                    <div class="product-img">
                        <img src="./img/product/feature-product/f-p-3.jpg" alt="img">
                        <div class="product-links">
                            <a class="item-link"><i class="fa fa-eye"></i></a>
                            <a class="item-link"><i class="fa fa-heart"></i></a>
                            <a class="item-link"><i class="fa fa-shopping-cart"></i></a>
                        </div>
                    </div>
                    <div class="product-content">
                        <h5>men stylist smart watch</h5>
                        <span>$25.00</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!--========================== End Related Product Area =================================-->

@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset("frontend/css/product-details.css") }}">
@endpush