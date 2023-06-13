<nav class="topnav navbar navbar-expand shadow justify-content-between
 justify-content-sm-start navbar-light bg-white shadow-none"
 id="sidenavAccordion">

    @can('ver-sidebar')
        <button class="btn btn-icon order-1 order-lg-0 me-2 ms-lg-2 me-lg-0"
            id="sidebarToggle">
            <i style="width: 30px; height: 30px;" data-feather="menu"></i>
        </button>
    @endcan

    {{-- <img src="{{ asset('images/logo.png')}}" height="60" alt=""> --}}
    <strong class="text-black text-center">Muebles y diseños el roble</strong>

    <div class="input-group mt-2">
        <input type="text" class="form-control text-white" style="background: #C77353;" aria-label="Name">
        <button class="btn text-white border-0 btn-buscador" aria-label="Buscar">
            <i class="fas fa-search"></i>
        </button>
    </div>

    <ul class="navbar-nav align-items-center ms-auto ps-2">
        <li class="nav-item no-caret d-none d-sm-block d-none me-3 text-white">
            <b class="fw-bolder text-white"> </b>
        </li>

        <li class="nav-item dropdown no-caret dropdown-user me-3 me-lg-5 ">
            <a class="btn color-secondary btn-car" href="{{route('shopping-car')}}">
                <i class="fas fa-shopping-cart"></i>
                <div id="div-notificaciones">
                    @include('home.notificacion-item')
                </div>
            </a>
        </li>
    </ul>
</nav>
