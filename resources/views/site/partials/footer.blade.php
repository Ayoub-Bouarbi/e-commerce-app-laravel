<!-- Footer Section Begin -->
<footer class="footer spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer__about">
                    <div class="footer__about__logo">
                        <a href="{{ route('home') }}"><img src="{{ asset('img/logo.png') }}" alt=""></a>
                    </div>
                    <ul>
                        <li>{{ __('Address') . ' : ' . config('settings.company_address') }}</li>
                        <li>{{ __('Phone') . ' : ' . config('settings.company_phone') }}</li>
                        <li>{{ __('Email') . ' : ' . config('settings.default_email_address') }}</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                <div class="footer__widget">
                    <h6>{{ __('Useful Links') }}</h6>
                    <ul>
                        <li><a href="#">{{ __('About us') }}</a></li>
                        <li><a href="#">{{ __('About Our Shop') }}</a></li>
                        <li><a href="#">{{ __('Secure Shopping') }}</a></li>
                        <li><a href="#">{{ __('Delivery information') }}</a></li>
                        <li><a href="#">{{ __('Privacy Policy') }}</a></li>
                        <li><a href="#">{{ __('Our Sitemap') }}</a></li>
                    </ul>
                    <ul>
                        <li><a href="#">{{ __('Who We Are') }}</a></li>
                        <li><a href="#">{{ __('Our Services') }}</a></li>
                        <li><a href="#">{{ __('Projects') }}</a></li>
                        <li><a href="{{ route('contact') }}">{{ __('Contact us') }}</a></li>
                        <li><a href="#">{{ __('Innovation') }}</a></li>
                        <li><a href="#">{{ __('Testimonials') }}</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="footer__widget">
                    <h6>{{ __('Join Our Newsletter Now') }}</h6>
                    <p>{{ __('Get Email updates about our latest shop and special offers.') }}</p>
                    <form action="#">
                        <input type="text" placeholder="{{ __('Enter your mail') }}">
                        <button type="submit" class="site-btn">{{ __('Subscribe') }}</button>
                    </form>
                    <div class="footer__widget__social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-pinterest"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="footer__copyright">
                    <div class="footer__copyright__text">
                        <p>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>
                                document.write(new Date().getFullYear());

                            </script>
                        </p>
                    </div>
                    <div class="footer__copyright__payment"><img src="{{ asset('img/payment-item.png') }}" alt=""></div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->
