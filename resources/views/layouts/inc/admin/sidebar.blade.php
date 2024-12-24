<nav class="sidebar sidebar-offcanvas pt-5" style="background-color: #3E6D81;" id="sidebar">
    <ul class="nav">
        <li class="nav-item" style="border: none;">
            <a class="nav-link" style="color: white !important;" style="color: white !important;" href="index.html">
                <span style="font-size: 20px;">
                    <b>
                        Data
                    </b>
                </span>
            </a>
        </li>
        <li class="ms-3 me-3 nav-item" style="border: none;">
            <a class="nav-link ms-0 ps-0" style="color: white !important;" href="#">
                <iconify-icon icon="carbon:user-filled"></iconify-icon>
                &emsp;
                <span class="menu-title">Users</span>
            </a>
        </li>
        <div class="ms-3 me-3">
            <hr style="background-color: #fff; height: 3px;">
        </div>
        <li class="nav-item" style="border: none;">
            <a class="nav-link" style="color: white !important;" style="color: white !important;" href="index.html">
                <span style="font-size: 20px;">
                    <b>
                        Collection
                    </b>
                </span>
            </a>
        </li>
        <li class="ms-3 me-3 mt-0 pt-0 mb-0 pb-0 nav-item" style="border: none;">
            <a class=" nav-link ms-0 ps-0" style="color: white !important;" href="#">
                <iconify-icon icon="ant-design:file-text-filled"></iconify-icon>
                &emsp;
                <span class="menu-title">Pronoun</span>
            </a>
        </li>
        <li class="ms-3 me-3 mt-0 pt-0 mb-0 pb-0 nav-item" style="border: none;">
            <a class="nav-link ms-0 ps-0" style="color: white !important;" href="#">
                <iconify-icon icon="bi:question-square-fill"></iconify-icon>
                &emsp;
                <span class="menu-title">Collections</span>
            </a>
        </li>
        <li class="nav-item mt-3 ms-3 me-3" style="border-top: 1px solid white;">
            <a class="nav-link ms-0 ps-0" href="{{ route('logout') }}" style="color: white !important;" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <iconify-icon icon="ic:outline-log-out"></iconify-icon>
                &emsp;
                <span class="menu-title">Logout</span>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </a>
        </li>
    </ul>
</nav>