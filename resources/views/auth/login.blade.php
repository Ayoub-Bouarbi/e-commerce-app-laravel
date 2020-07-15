@extends('site.app')
@section('title',"Home")

@section('content')

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Organi Shop</h2>
                    <div class="breadcrumb__option">
                        <a href="{{ route('home') }}">Home</a>
                        <span>Login</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<section class="section-content bg padding-y">
    <div class="container">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <header class="card-header">
                    <h4 class="card-title mt-2">Sign In</h4>
                </header>
                <article class="card-body">
                    <form action="{{ route('login') }}" method="POST" role="form">
                        @csrf
                        <div class="form-group">
                            <label for="email">E-Mail Address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group row mr-auto">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="site-btn btn-block"> Login </button>
                        </div>
                    </form>
                </article>
                <div class="border-top card-body text-center">Don't have an account? <a href="{{ route('register') }}">Sign Up</a></div>
            </div>
        </div>
    </div>
</section>
@endsection