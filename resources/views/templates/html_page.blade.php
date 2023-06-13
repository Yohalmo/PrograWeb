<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Proyecto USO de diseño web donde se presenta una tienda en linea que permite registrarse, hacer compras y tiene un nivel administrativo que permite hacer los cambios sin necesidad de un programador para realizarlos">
        <meta name="author" content="">

        <meta name="_token" content="{{csrf_token()}}"/>
        <title>El Roble</title>
        @yield('headerData')

        <link rel="stylesheet" type="text/css" href="{{asset('css/helper.css')}}" media="all">
        <link rel="stylesheet" type="text/css" href="{{asset('css/styles.css')}}" media="all">


        <script src="{{asset('js/jquery.min.js')}}" async defer></script>

    @yield('scriptsHeader')
    </header>
    <body class="nav-fixed p-0 {{ $StylesBody ?? 'bg-white' }} {{  isMobileDevice() ? '' : 'sidebar-toggled sidenav-toggled' }}">

        @if (session('info'))
            <div class="alert alert-warning">
                {{ session('info') }}
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('danger'))
            <div class="alert alert-danger">
                {{ session('danger') }}
            </div>
        @endif

        @yield('Data')

        <div hidden id="div-scripts"></div>

        <div aria-hidden="true" tabindex="-1" role="dialog" class="modal modal-blur fade p-0" id="modal-principal" name="modal-principal"
            data-bs-backdrop='static'>
            <div class="modal-dialog modal-lg p-2">
                <!-- CONTENIDO DEL MODAL -->
                <div class="modal-content" id="principal-modal-content">
                </div>
            </div>
        </div>
    </body>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js"
    crossorigin="anonymous" async defer></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous" async defer></script>

    <script src="https://kit.fontawesome.com/35b4dfd2b7.js" async defer crossorigin="anonymous"></script>
    <script src="{{asset('js/bootstrap-validate.js')}}" async defer></script>
    <script src="{{asset('js/scripts.js')}}" async defer></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}" async defer></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11" async defer></script>
    <script src="{{asset('js/index.js')}}" async defer></script>

    <script>
        let navegador = navigator.userAgent;


        function redimensionar(){
            if (navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/webOS/i) || navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i) || navigator.userAgent.match(/iPod/i) || navigator.userAgent.match(/BlackBerry/i) || navigator.userAgent.match(/Windows Phone/i)) {
                $('body').removeClass('sidebar-toggled sidenav-toggled');
            }
        }

        $(window).on("resize", function(){
            redimensionar();
        });

        redimensionar();
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>

    @yield('scripts')

</html>
