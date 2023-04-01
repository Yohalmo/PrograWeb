<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <meta name="_token" content="{{csrf_token()}}"/>
        <title></title>
        <meta http-equiv="Expires" content="0">
        <meta http-equiv="Last-Modified" content="0">
        <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
        <meta http-equiv="Pragma" content="no-cache">

        @yield('headerData')

        <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-select.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}"><link rel="stylesheet" type="text/css" href="{{asset('css/form.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/helper.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/styles.css')}}">

        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <script src="{{asset('js/jquery.min.js')}}"></script>

    @yield('scriptsHeader')
    </header>
    <body class="nav-fixed p-0  {{  isMobileDevice() ? '' : 'sidebar-toggled sidenav-toggled' }} {{isset($backColor) ? $backColor : '' }} ">

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


        <div aria-hidden="true" tabindex="-1" role="dialog" class="modal modal-blur fade p-0" id="BigModalInfo" name="BigModalInfo"
            data-bs-backdrop='static'>
            <div class="modal-dialog modal-lg p-2">
                <!-- CONTENIDO DEL MODAL -->
                <div class="modal-content" id="CuerpoBigModal">
                </div>
            </div>
        </div>
    </body>

    <script src="{{ asset("js/form.js") }}" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous"></script>

    <script src="https://kit.fontawesome.com/35b4dfd2b7.js" crossorigin="anonymous"></script>
    <script src="{{asset('js/bootstrap-validate.js')}}"></script>
    <script src="{{asset('js/scripts.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset("js/bootstrap-select.js") }}" type="text/javascript"></script>
    <script src="{{asset('js/admin.min.js')}}"></script>
    <script src="{{asset('js/jquery.mask.js')}}"></script>
    <script src="{{asset('js/index.js')}}"></script>

    <script>
        let navegador = navigator.userAgent;
        if (navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/webOS/i) || navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i) || navigator.userAgent.match(/iPod/i) || navigator.userAgent.match(/BlackBerry/i) || navigator.userAgent.match(/Windows Phone/i)) {
            $('body').removeClass('sidebar-toggled sidenav-toggled');
        }
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>

    @yield('scripts')

</html>
