@extends('templates.MainTemplate')

@section('body')
<x-card-info>
    @slot('backLink',route('user.index'))
    @slot('titulo','Edicion de Usuario')

    @slot('cardBody')

    <form method="post" id="FrmUser" class="row" novalidate>
        @csrf
        <input type="hidden" value="{{ $row->IdUsuario }}" name="usuario">

        <div class="form-group col-xl-4 col-md-4 col-sm-12 mb-2">
            <label for="firstname"
                class="col-md-12 col-form-label text-md-right"><strong>Nombres</strong></label>

            <div>
                <input id="firstname" type="text" class="form-control "
                    name="nombres" value="{{ $row->NombresUsuario }}" required autocomplete="firstname"
                    autofocus>
            </div>
        </div>

        <div class="form-group col-xl-4 col-md-4 col-sm-12 mb-2">
            <label for="firstname"
                class="col-md-12 col-form-label text-md-right"><strong>Apellidos</strong></label>

            <div>
                <input type="text" class="form-control "
                    name="apellidos" value="{{ $row->ApellidosUsuario }}" required autocomplete="firstname"
                    autofocus>
            </div>
        </div>

        <div class="form-group col-xl-4 col-md-4 col-sm-12 mb-2">
            <label for="email"
                class="col-md-12 col-form-label text-md-right"><strong>Correo</strong></label>
            <div>
                <input id="email" type="email" class="form-control "
                    name="correo" value="{{ $row->CorreoUsuario }}" required autocomplete="email">
            </div>
        </div>

        <div class="form-group col-xl-4 col-md-4 col-sm-12 mb-2">
            <label for="email"
                class="col-md-12 col-form-label text-md-right"><strong>Teléfono</strong></label>
            <div>
                <input id="telefono" name="telefono" type="text" class="form-control "
                        name="text" value="{{ $row->TelefonoUsuario }}">
            </div>
        </div>

        <div class="form-group col-xl-4 col-md-4 col-sm-12 mb-2">
            <label for="password"
                class="col-md-12 col-form-label text-md-right"><strong>Contraseña</strong></label>

            <div>
                <input id="password" type="password"
                    class="form-control" name="pass"
                    autocomplete="new-password"/>
            </div>
        </div>


        <div class="form-group mb-2">
            <label for="email"
                class="col-md-12 col-form-label text-md-right"><strong>Dirección</strong></label>
            <div>
                <textarea name="direccion" id="direccion" cols="30" rows="10"
                class="form-control">{{ $row->DireccionUsuario }}</textarea>
            </div>
        </div>

        <div class="form-group row">
            <h2 class="col-12 text-center mt-3 mb-3"><strong>Roles asignados</strong></h2>
            <div class="col-12 row" style="margin-left: 15px;">
                @foreach ($roles as $role)
                    <div class="col-xl-3 col-md-4 col-sm-12 mb-3 mt-2">
                        <div class="card p-2">
                            <label class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="roles[]"
                                    value="{{ $role->id }}"
                                    @if ($row->hasRole($role->id)) checked @endif/>{{ $role->name }}
                                <em><br> ({{ $role->description ?? 'Sin Descripcion' }})</em>
                            </label>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </form>
    @endslot

    @slot('cardFooter')
        <div class="text-end">
            <button type="button" class="btn main-color" form="UserInfo"
            onclick="MakeRequestData( '{{ route('user.update') }}', '', true, '', 'POST', 5, '#FrmUser', false, true)">
                <i class="fas fa-save"></i>&nbsp;&nbsp;&nbsp;Actualizar
            </button>
        </div>
    @endslot
</x-card-info>
@endsection
