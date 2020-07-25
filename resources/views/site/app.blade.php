<!DOCTYPE html>
<html lang="{{ session()->get('locale') }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - {{ config('app.name') }}</title>

    @include('site.partials.styles')

</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    @include('site.partials.humberger')

    @include('site.partials.header')

    @include('site.partials.hero')
    

    <main id="app">
        @yield('content')
    </main>

    @include('site.partials.footer')

    @include('site.partials.scripts')
</body>

</html>
