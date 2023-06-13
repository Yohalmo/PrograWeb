<nav class="topnav navbar navbar-expand shadow justify-content-between
 justify-content-sm-start navbar-light bg-white shadow-none transparente"
 id="sidenavAccordion" style="background-color: rgba(255, 255, 255, 0) !important;">

    @can('ver-sidebar')
        <button class="btn btn-icon order-1 order-lg-0 me-2 ms-lg-2 me-lg-0"
            id="sidebarToggle">
            <i style="width: 30px; height: 30px;" data-feather="menu"></i>
        </button>
    @endcan

    <div class="position-relative me-2 ms-2 bg-white ocultar-moviles text-black">
        <strong>Muebles y diseños el roble</strong>
    </div>

    <ul class="navbar-nav align-items-center ms-auto">
        <li class="nav-item no-caret d-none d-sm-block d-none me-3 text-white">
            <b class="fw-bolder text-white"> </b>
        </li>

        <li class="nav-item dropdown no-caret dropdown-user me-3 me-lg-5 ">
            @if (Session::has('user-info'))
                <a href="" class="btn-btn-main">Enviar orden</a>
            @else
                <a href="{{ route('usuario.registro') }}" class="btn-main"><strong>Registrarse</strong></a>
                <a href="{{route('login')}}" class="btn-main"><strong>Iniciar sesión</strong></a>
            @endif
        </li>
    </ul>
</nav>
