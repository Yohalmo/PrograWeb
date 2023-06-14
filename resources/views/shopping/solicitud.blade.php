@extends('templates.MainTemplate', ['navbarView' => 'navbar-admin'])

@section("scripts")
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="{{asset('js/mapa.js')}}"></script>
@endsection

@section('body')

    <div class="row">
        <div class="col-xl-6 col-md-6 col-sm-12 envio-item" id="map">
        </div>

        <div class="col-xl-6 col-md-6 col-sm-12 p-4 m-auto">
            <form action="" id="FormOrden" class="card shadow-none" style="border-radius: 15px">
                @csrf
                <div class="card-body">
                    <div class="text-center text-black mb-3"><strong>Formulario de envio</strong></div>

                    <div class="row col-12">
                        <button type="button" onclick="TipoEntrega(2)" id="btn2" class="btn main-color col-xl-6 col-md-12 col-sm-12">A domicilio</button>
                        <button type="button" onclick="TipoEntrega(1)" id="btn1" class="btn border-black col-xl-6 col-md-12 col-sm-12">Para recoger</button>
                    </div>
                    <hr>

                    <div id="entrega" class="envio-item">
                        <div class="form-group">
                            <label class="form-label required text-black">Ubicación GPS</label>
                            <input type="text" class="form-control mb-3" id="coordenadas" name="coordenadas"
                            onfocus="$(this).prop('readonly', true)" onfocusout="$(this).prop('readonly', false)" required>
                        </div>
                    </div>

                    <div id="recoger" class="recoger-item d-none">

                        <div class="form-group mb-3">
                            <label class="form-label required text-black">Fecha</label>
                            <input type="date" class="form-control mb-3" id="fecha" name="fecha">
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label required text-black">Hora</label>
                            <input type="time" class="form-control mb-3" id="hora" name="hora">
                        </div>
                    </div>

                    <div class="form-group mt-3 mb-3">
                        <label class="form-label required text-black">Comentarios</label>
                        <textarea class="form-control" name="comentario" required id="comentario" cols="30" rows="10"></textarea>
                    </div>

                    <button class="btn col-12 btn-success" type="button"
                        onclick="MakeRequestData('{{route('guardar-solicitud')}}', '', true, '', 'POST',
                        5, '#FormOrden', false, false, [], AlertWait)"><strong>Confirmar</strong></button>
                </div>
            </form>
        </div>
    </div>
@endsection
