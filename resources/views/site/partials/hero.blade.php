<!-- Hero Section Begin -->
<section class="hero hero-normal">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>{{ __('All Departments') }}</span>
                    </div>
                    <ul>
                        @foreach ($categories as $cat)
                            @forelse ($cat->items as $category)
                            <li>
                                <a href="{{ route('category.show',$category->slug) }}">{{ Str::ucfirst($category->name) }}</a>
                            </li>
                            @empty
                                <p>{{ __('There is no Category') }}</p>
                            @endforelse
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="{{ route('product.search') }}" method="GET">
                            <input type="text" name="search" placeholder="{{ __('What do you need?') }}">
                            <button type="submit" class="site-btn">{{ __('SEARCH') }}</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>{{ config('settings.company_phone') }}</h5>
                            <span>{{ __('Support 24/7 Time') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->
