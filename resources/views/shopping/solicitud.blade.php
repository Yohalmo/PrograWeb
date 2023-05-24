@extends('templates.MainTemplate', ['navbarView' => 'navbar-admin'])

@section("scripts")
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="{{asset('js/mapa.js')}}"></script>
@endsection

@section('body')

    <div class="row">
        <div class="col-xl-6 col-md-6 col-sm-12" id="map">
        </div>

        <div class="col-xl-6 col-md-6 col-sm-12 p-4">
            <form action="" class="card shadow-none" style="border-radius: 15px">
                @csrf
                <div class="card-body">
                    <div class="text-center text-black"><strong>Formulario de envio</strong></div>
                    <hr>

                    <div class="form-group">
                        <label class="form-label required text-black">Ubicación GPS</label>
                        <input type="text" class="form-control mb-3" id="coordenadas" name="coordenadas" required
                        onfocus="$(this).prop('readonly', true)" onfocusout="$(this).prop('readonly', false)">
                    </div>

                    <button class="btn col-12 btn-success" type="button"><strong>Confirmar</strong></button>
                </div>
            </form>
        </div>
    </div>
@endsection
