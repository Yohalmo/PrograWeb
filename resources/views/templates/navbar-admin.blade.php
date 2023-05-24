<nav class="topnav navbar navbar-expand shadow justify-content-between
 justify-content-sm-start navbar-light shadow-none main-color"
 id="sidenavAccordion">

    @can('ver-sidebar')
        <button class="btn btn-icon order-1 order-lg-0 me-2 ms-lg-2 me-lg-0"
            id="sidebarToggle">
            <i style="width: 30px; height: 30px;" data-feather="menu"></i>
        </button>
    @endcan

    <div class="position-relative me-2 ms-2 card bg-white" style="border-radius:20px">
        <div class="card-body ps-3 pe-3 pt-1 pb-1 text-black">
            <strong>Muebles y diseños el roble</strong>
        </div>
    </div>

    <ul class="navbar-nav align-items-center ms-auto">
        <li class="nav-item no-caret d-none d-sm-block d-none me-3 text-white">
            <b class="fw-bolder text-white"> </b>
        </li>

        <li class="nav-item dropdown no-caret dropdown-user me-3 me-lg-5 ">
            @if (Session::has('user-info'))
                <li class="nav-item no-caret d-none d-sm-block d-none me-3 text-black">
                    <div class="card shadow-none" style="border-radius:20px">
                        <div class="card-body ps-3 pe-3 pt-1 pb-1">
                            <b class="fw-bolder">
                                {{ Session::get('user-info')->NombresUsuario . ' ' . Session::get('user-info')->ApellidosUsuario }} </b>
                        </div>
                    </div>
                </li>

                <li class="nav-item dropdown no-caret dropdown-user me-3 me-lg-5 ">
                    <a class="btn btn-icon btn-transparent-dark dropdown-toggle circle bg-white" id="navbarDropdownUserImage"
                        href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"><i class="fas fa-user text-black"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up"
                        aria-labelledby="navbarDropdownUserImage">
                        <h6 class="dropdown-header d-flex align-items-center">
                            <div class="card rounded-circle shadow-none me-2 border-dark">
                                <div class="card-body">
                                    <i class="fas fa-user text-black"></i>
                                </div>
                            </div>
                            <div class="dropdown-user-details">
                                <div class="dropdown-user-details-name">{{ Session::get('user-info')->NombresUsuario }}
                                </div>
                            </div>
                        </h6>

                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">
                            <div class="text-center p-1"><i class="fas fa-user"></i> &nbsp; Editar información</div>
                        </a>
                        <a class="dropdown-item">
                            <form id="logoutForm" method="POST" action="{{ route('logout') }}">
                                <button class="dropdown-item" type="submit"><i class="fas fa-sign-out-alt"></i> &nbsp; Cerrar
                                    sesión</button>
                                @csrf
                            </form>
                        </a>
                    </div>
                </li>
            @else
                <a href="" class="btn-main"><strong>Registrarse</strong></a>
                <a href="{{route('login')}}" class="btn-main"><strong>Iniciar sesión</strong></a>
            @endif
        </li>
    </ul>
</nav>
