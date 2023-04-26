<nav class="topnav navbar navbar-expand shadow justify-content-between justify-content-sm-start navbar-light bg-white shadow-none" id="sidenavAccordion">
    <button class="btn btn-icon text-white order-1 order-lg-0 me-2 ms-lg-2 me-lg-0" id="sidebarToggle"><i style="width: 30px; height: 30px;" data-feather="menu"></i></button>
    <a class="pe-3 ps-1 ps-lg-12 text-truncate text-white showtittle max-lines-1" href="#"><center><strong></strong></center></a>
    <a class="pe-3 ps-1 ps-lg-12 text-truncate text-white showsmalltittle max-lines-1" href="#"><center><strong></strong></center></a>

    <ul class="navbar-nav align-items-center ms-auto">
        <li class="nav-item no-caret d-none d-sm-block d-none me-3 text-white">
            <b class="fw-bolder text-white"> </b>
        </li>

        <li class="nav-item dropdown no-caret dropdown-user me-3 me-lg-5 ">
            @if (Session::has('user-info'))

            @else
                <a href="" class="btn-main"><strong>Registrarse</strong></a>
                <a href="{{route('login')}}" class="btn-main"><strong>Iniciar sesión</strong></a>
            @endif
        </li>
    </ul>
</nav>
