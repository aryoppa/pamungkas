<!doctype html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SmartEngTest') }}</title>
    <link rel="icon" href="{!! url('assets/images/logo-top.png')!!}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <!-- <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    {{-- icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    {{-- animation --}}
    <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>

    <!-- ===== Fontawesome CDN Link ===== -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" /> -->

    <!-- Styles -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    {{-- script --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    {{-- midtrans --}}
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript"
      src="https://app.sandbox.midtrans.com/snap/snap.js"
      data-client-key="{{config('midtrans.client_key')}}"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-color-primary shadow-sm fixed-top">
            <div class="container ps-3 pe-3">
                @if (Auth::guest())
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('assets/images/logo-dark.png') }}" alt="logo-image" width="70%">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <!-- <li class="nav-item">
                            <a class="nav-link me-5" href="/demo">Demo</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link me-5" href="/cbt">CBT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link me-5" href="/learn">Belajar</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link me-5" href="/help">Bantuan</a>
                        </li> -->
                        <!-- <li class="nav-item">
                            <a class="nav-link me-5" href="/about">Tentang</a>
                        </li> -->
                        <li class="nav-item">
                            <a href="/login" class="btn bg-light p-1 ps-3 pe-3 mt-1 text-color-primary fw-bold" style="border-radius: 20px;">
                                Masuk
                            </a>
                        </li>
                        @elseif (Auth::user())
                        <a class="navbar-brand" href="{{ url('/home') }}">
                            <img src="{{ asset('assets/images/logo-dark.png') }}" alt="logo-image" width="70%">
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                <!-- <li class="nav-item">
                                    <a class="nav-link me-5" href="/question-collection">Koleksi Soal</a>
                                </li> -->
                                <!-- <li class="nav-item">
                                    <a class="nav-link me-5" href="/generate">Buat Soal</a>
                                </li> -->
                                <li class="nav-item">
                                    <a class="nav-link me-5" href="/cbt">CBT</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link me-5" href="/learn">Belajar</a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a class="nav-link me-5" href="/help">Bantuan</a>
                                </li> -->
                                <!-- <li class="nav-item">
                                    <a class="nav-link me-5" href="/about">Tentang</a>
                                </li> -->
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <iconify-icon icon="carbon:user-avatar-filled-alt" style="font-size: 20px;"></iconify-icon>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li>
                                            <a class="dropdown-item" href="/profile">
                                                <iconify-icon icon="carbon:user"></iconify-icon>
                                                Profil
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="/balance">
                                                <iconify-icon icon="ion:wallet-outline"></iconify-icon>
                                                Rp{{ number_format(Auth::user()->userBalance->balance, 0, ',', '.') }}
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="/logout">
                                                <iconify-icon inline icon="carbon:logout"></iconify-icon>
                                                Keluar
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                @endif
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
            spaceBetween: 30,
            slidesPerGroup: 1,
            loop: false,
            loopFillGroupWithBlank: false,
            navigation: {
                nextEl: ".next-btn",
                prevEl: ".prev-btn",
            },
        });
    </script>
    <script src="{{ asset('https://code.iconify.design/iconify-icon/1.0.1/iconify-icon.min.js') }}"></script>

</body>

</html>
