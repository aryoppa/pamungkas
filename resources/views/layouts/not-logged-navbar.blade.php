<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SmartEngTest') }}</title>
    <link rel="icon" href="/assets/images/logo-light.png" type="image/x-icon">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- ===== Fontawesome CDN Link ===== -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />


    <!-- Styles -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-color-primary shadow-sm fixed-top">
            <div class="container ps-3 pe-3">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="assets/images/logo-dark.png" alt="logo-image" width="70%">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link me-5" href="/demo">Demo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link me-5" href="/cbt">CBT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link me-5" href="/about">About</a>
                        </li>
                        <li class="nav-item">
                            <a href="/login" class="btn bg-light p-1 ps-3 pe-3 mt-1 text-color-primary fw-bold" style="border-radius: 20px;">
                                Sign In
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <main class="pt-5">
            @yield('content')
        </main>
    </div>

    <!-- Script -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-3.6.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/show-hide-password.js') }}"></script>
    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 3,
            spaceBetween: 40,
            slidesPerGroup: 3,
            loop: false,
            loopFillGroupWithBlank: false,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>
    <script src="{{ asset('https://code.iconify.design/iconify-icon/1.0.1/iconify-icon.min.js') }}"></script>
    <script src="{{ asset('https://code.iconify.design/iconify-icon/1.0.1/iconify-icon.min.js') }}"></script>
</body>

</html>