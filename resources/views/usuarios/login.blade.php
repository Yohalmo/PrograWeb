@extends('templates.html_page', ['StylesBody' => ' main-color'])

@section('Data')

<div class="container altura-total">

    <!-- Outer Row -->
    <div class="row justify-content-center align-items-center altura-total">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6" id="container-login">
                            <div class="p-5 m-auto" id="container-form" style="height: 100%">
                                <div class="ancho-total">
                                    <div class="text-center d-block">
                                        <h1 id="titulo"><strong>Iniciar Sesión</strong></h1>
                                    </div>
                                    <form class="user mt-5" action="{{route('home')}}">
                                        <div class="form-group mt-3">
                                            <label for="" class="form-label"><strong>Correo:</strong></label>
                                            <input type="email" class="input-form" id="email">
                                        </div>

                                        <div class="form-group mt-5">
                                            <label for="" class="form-label"><strong>Contraseña:</strong></label>
                                            <input type="password" class="input-form" id="password" name="password">
                                                <label id="lblRecuperar">Recuperar contraseña</label>
                                        </div>

                                        <div class="div-ingresar">
                                            <button id="login-boton">Ingresar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
@endsection

@section('headerData')
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
@endsection
