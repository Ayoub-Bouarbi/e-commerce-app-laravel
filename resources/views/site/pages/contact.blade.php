@extends('site.app')
@section('title',"Contact")

@section('content')
    
    <!--========================== Start Home Banner Area =================================-->

    <section class="banner-area">
        <div class="container">
            <div class="banner-content">
                <div class="banner-title float-left">
                    <h2>Contact</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
                <div class="banner-links float-right">
                    <a class="item-link" href="">Home</a>
                    <a class="item-link" href="">contact</a>
                </div>
            </div>
        </div>
    </section>


    <!--========================== End Home Banner Area =================================-->

    <!--========================== End Contact Area =================================-->

    <section class="contact-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h1>get in touch</h1>
                    <form action="">
                        <div class="form-group">
                            <textarea class="form-control" name="message" id="message" rows="10" placeholder="Enter Message"></textarea>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter your Name">
                            </div>
                            <div class="col-md-6">
                                <input type="email" name="email" id="email" class="form-control" placeholder="Enter your Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter your Subject">
                        </div>
                        <button class="g-btn">send message</button>
                    </form>
                </div>
                <div class="col-md-4 contact-info">
                    <div class="contact-content">
                        <div class="icon">
                            <i class="fa fa-home"></i>
                        </div>
                        <div class="contact-details">
                            <h5>Buttonwood, California.</h5>
                            <p>Rosemead, CA 91770</p>
                        </div>
                    </div>
                    <div class="contact-content">
                        <div class="icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="contact-details">
                            <h5>00 (440) 9865 562.</h5>
                            <p>Mon to Fri 9am to 6pm</p>
                        </div>
                    </div>
                    <div class="contact-content">
                        <div class="icon">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="contact-details">
                            <h5>support@colorlib.com.</h5>
                            <p>Send us your query anytime!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--========================== End Contact Area =================================-->

@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset("frontend/css/contact.css") }}">
@endpush