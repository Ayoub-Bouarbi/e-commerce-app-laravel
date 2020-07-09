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
                <div class="s_product_img">
                    <div
                      id="carouselExampleIndicators"
                      class="carousel slide"
                      data-ride="carousel"
                    >
                      <ol class="carousel-indicators">
                        @forelse ($product->images as $image) 
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">
                            <img src="{{ asset('storage/'.$image->full) }}" alt="" />
                        </li>
                        @empty     
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">
                            <img src="{{ asset('img/product/single-product/s-product-s-2.jpg') }}" alt="" />
                        </li>
                        @endforelse
                      </ol>
                      <div class="carousel-inner">
                          @forelse ($product->images as $image)
                          <div class="carousel-item active">
                            <img class="d-block w-100" src="{{ asset('storage/'.$image->full) }}" alt="First slide" />
                          </div>
                          @empty
                          <div class="carousel-item active">
                            <img class="d-block w-100" src="{{ asset('img/product/single-product/s-product-1.jpg') }}" alt="First slide" />
                          </div>
                          @endforelse
                      </div>
                    </div>
                  </div>
            </div>
            <div class="col-md-6">
                <div class="product-detail-content">
                    <h3>{{ $product->brand->name }}</h3>
                    <h1>{{ $product->name }}</h1> 
                    @if ($product->sale_price > 0)
                        <span class="num" id="productPrice">{{config('settings.currency_symbol') . $product->sale_price }}</span>
                        <del class="price-old">{{config('settings.currency_symbol') . $product->price }}</del>
                    @else
                        <span class="num" id="productPrice">{{ config('settings.currency_symbol') . $product->price }}</span>
                    @endif
                    <p>
                        Category : 
                        @foreach ($product->categories as $category)
                        <a href="#">
                             {{ $category->name }}
                        </a>
                        @endforeach 
                    </p>
                    <p>Availivility : <span>In Stock</span></p>
                    <hr />
                    <p>
                        {!! $product->description !!}
                    </p>
                    <form action="{{ route('product.add.cart') }}" method="POST" role="form" id="addToCart">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                @foreach ($attributes as $attribute) 
                                <div class="col-md-6">
                                    <span>{{ $attribute->name }}: </span>
                                    @php $attributeCheck = in_array($attribute->id, $product->attributes->pluck('attribute_id')->toArray()) @endphp
                                    @if ($attributeCheck)
                                        <select class="form-control option" name="{{ strtolower($attribute->name ) }}" id="{{ strtolower($attribute->name ) }}">
                                            @foreach ($product->attributes as $attributeValue)
                                                @if ($attributeValue->attribute_id == $attribute->id)
                                                <option
                                                    data-price="{{ $attributeValue->price }}"
                                                    value="{{ $attributeValue->value }}"> {{ ucwords($attributeValue->value . ' +'. $attributeValue->price) }}
                                                </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    @endif
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Quantity : </label>
                            <input type="number" class="form-control" name="qty" min="1"max="{{ $product->quantity }}" value="1" id="qty" />
                            <input type="hidden" name="productId" value="{{ $product->id }}">
                            <input type="hidden" name="price" id="finalPrice" value="{{ $product->sale_price != '' ? $product->sale_price : $product->price }}">
                            <input type="hidden" name="image" id="image" value="{{ $product->images->count() > 0 ? $product->images->first()->full : '' }}">
                        </div>
                        <button type="submit" class="g-btn">Add to cart</button>
                        <button class="heart-btn"><i class="fa fa-heart"></i></button>
                    </form>
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
                    {{ $product->description }}    
                </p>
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