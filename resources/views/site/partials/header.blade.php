    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i>{{config('settings.default_email_address')}}</li>
                                <li>{{ __('Free Shipping for all Order of $99') }}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>

                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            <div class="header__top__right__language">
                                <img src="{{ asset('img/language.png') }}" alt="">
                                @php
                                    $locale = session()->get('locale');
                                @endphp
                                @switch($locale)
                                    @case('fr')
                                        <div>Frensh</div>
                                        @break
                                    @case('ar')
                                        <div>Arabic</div>
                                        @break
                                    @default
                                        <div>English</div>
                                @endswitch
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="{{ route('lang','fr') }}">Frensh</a></li>
                                    <li><a href="{{ route('lang','en') }}">English</a></li>
                                    <li><a href="{{ route('lang','ar') }}">Arabic</a></li>
                                </ul>
                            </div>
                            <div class="header__top__right__auth">
                                @guest
                                <a href="{{ route('login') }}"><i class="fa fa-user"></i> {{ __('Login') }}</a>
                                @else
                                <div class="header__top__left__login">
                                    <div>{{ Str::ucfirst(Auth::user()->full_name) }}</div>
                                    <span class="arrow_carrot-down"></span>
                                    <ul>
                                        <li>
                                            <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                                @endguest
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="{{ route('home') }}"><img src="{{ asset('img/logo.png') }}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                            <li><a href="{{ route('category.index') }}">{{ __('Shop') }}</a></li>
                            <li><a href="{{ route('contact') }}">{{ __('Contact us') }}</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                            <li><a href="{{ route('checkout.cart') }}"><i class="fa fa-shopping-bag"></i>
                                    <span>{{ Cart::getContent()->count() }}</span></a></li>
                        </ul>
                        <div class="header__cart__price">{{ __('Items') }}:
                            <span>{{ config('settings.currency_symbol') . Cart::getSubTotal() }}</span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->
