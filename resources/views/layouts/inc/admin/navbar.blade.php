<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
            <a class="navbar-brand brand-logo" href="/admin/dashboard">
                <img src="{{ asset('assets/images/logo-light.png') }}" alt="logo" width="70%" />
            </a>
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="mdi mdi-sort-variant"></span>
            </button>
        </div>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile">
                <a class="nav-link" href="#">
                    <span class="nav-profile-name">Admin</span>
                    <iconify-icon icon="carbon:user-avatar-filled-alt"></iconify-icon>
                </a>
            </li>
        </ul>
    </div>
</nav>