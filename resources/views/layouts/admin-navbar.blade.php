<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Smart EngTest') }}</title>
    <link rel="icon" href="assets/images/logo.png" type="image/x-icon">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="{{ asset('admin/dist/css/adminlte.min.css') }}" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                        <iconify-icon inline icon="ic:sharp-menu" class="nav-icon fs-3"></iconify-icon>
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        {{ Auth::user()->name }} &nbsp; <iconify-icon inline icon="iconoir:profile-circled" class="fs-5"></iconify-icon>
                    </a>
                </li>
            </ul>
        </nav>


        <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #3E6D81 !important;">
            <a href="/admin-dashboard">
                <img src="assets/images/logo-dark.png" alt="AdminLTE Logo" class="m-4" width="100px">
            </a>
            <div class="sidebar pt-5" style="background-color: #3E6D81 !important;">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <p class="ps-3 text-white fs-6">
                                <b>
                                    DATA
                                </b>
                            </p>
                            <a href="/user-dashboard" class="nav-link">
                                <iconify-icon inline icon="mdi:account" class="nav-icon"></iconify-icon>
                                <p>
                                    Users
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/payment-request" class="nav-link">
                                <iconify-icon inline icon="ri:coins-fill" class="nav-icon"></iconify-icon>
                                <p>
                                    Payment Request
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/premium-request" class="nav-link">
                                <iconify-icon inline icon="ph:key" class="nav-icon"></iconify-icon>
                                <p>
                                    Premium Request
                                </p>
                            </a>
                            <hr class="mx-3 mt-2 bg-white">
                        </li>
                        <li class="nav-item mt-3">
                            <p class="ps-3 text-white fs-6">
                                <b>
                                    COLLECTION
                                </b>
                            </p>
                        </li>
                        <li class="nav-item">
                            <a href="/question" class="nav-link">
                                <iconify-icon inline icon="fluent:notebook-question-mark-20-filled" class="nav-icon"></iconify-icon>
                                <p>
                                    Question
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/learning" class="nav-link">
                                <iconify-icon inline icon="fluent:notebook-question-mark-20-filled" class="nav-icon"></iconify-icon>
                                <p>
                                    Learning
                                </p>
                            </a>
                        </li>
                        <li class="nav-item mt-3">
                            <hr class="mx-3 bg-white">
                            <a href="/logout" class="nav-link pt-0 pb-0">
                                <iconify-icon inline icon="ri:logout-box-r-fill" class="nav-icon"></iconify-icon>
                                <p>
                                    Logout
                                </p>
                            </a>
                            <hr class="mx-3 bg-white">
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <!-- Content -->
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <main>
                            @yield('content')
                        </main>
                    </div>
                </div>
            </div>
        </div>
        <footer class="main-footer">
            Copyright &copy; 2022 Smart EngTest Team. All rights reserved.
        </footer>
    </div>

    <script src="{{ asset('https://code.iconify.design/iconify-icon/1.0.2/iconify-icon.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="{{ asset('admin/dist/plugin/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/dist/js/adminlte.js') }}"></script>
</body>

</html>
