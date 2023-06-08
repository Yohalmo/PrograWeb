
<div id="layoutSidenav_nav">
    <nav class="sidenav shadow-right sidenav-dark main-color">
        <div class="sidenav-menu ">
            <div class="nav accordion" id="accordionSidenav" >
                <div align="center">
                    <div class="mt-3 m-auto">
                        <div class="card card-body rounded-circle" style="width: 70%; overflow: hidden">
                            <img class="img-fluid"
                                src="{{asset('images/logo.png')}}" alt="" draggable="false">
                        </div>
                    </div>
                </div>

                <!-- Sidenav Menu Heading (Core)-->

                <div class="sidenav-menu-heading text-white">MENU PRINCIPAL</div>

                <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse"
                    data-bs-target="#PrimerMenu" aria-expanded="false"
                    aria-controls="PrimerMenu">
                    <div class="nav-link-icon text-white"><i data-feather="activity"></i></div>
                    <span class=" text-white">Portal de Usuario</span>

                    <div class="sidenav-collapse-arrow text-light"><i class="fas fa-angle-down"></i></div>
                </a>

                <div class="collapse show" id="PrimerMenu" data-bs-parent="#accordionSidenav">
                    <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                        <a class="nav-link text-white " id="home-page" href="{{route('productos.listado')}}">Productos</a>
                        <a class="nav-link text-white " href="{{ route('categorias.index') }}">Categorias</a>
                        <a class="nav-link text-white" id="tramites" href="">Ordenes</a>
                        <a class="nav-link text-white" id="pfrecuentes" href="{{ route('user.index') }}">Usuarios</a>
                        <a class="nav-link text-white" id="pfrecuentes" href="{{ route('permissions.index') }}">Permisos</a>
                        <a class="nav-link text-white" id="pfrecuentes" href="{{ route('role.index') }}">Roles</a>
                    </nav>
                </div>
            </div>
        </div>
    </nav>
</div>
