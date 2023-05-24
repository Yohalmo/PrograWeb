@extends('templates.MainTemplate')
@section('pretittle', 'Vista general')
@section('tittle', 'USUARIOS')
@section("scripts")

@endsection

@section('body')

<label hidden class="d-none" id="AlertUser">¿Esta seguro que quiere cambiar el estado de esta categoria?</label>

<x-table>
    @slot('idTabla')
    tablePermisos
    @endslot

    @slot('titulo')
    Listado de categorias
    @endslot

    @slot('btnsAdicionales')
        <button class="btn main-color text-white" onclick="MakeRequestData( '{{ route('category-modal') }}', '#principal-modal-content', true, '#modal-principal', 'POST', 2, '', false, false,
        ['Id/0', 'Accion/4','Contenedor/tablePermisos'])" title="Nuevo" id="Nuevo">
            <i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Nuevo
        </button>
    @endslot

    @slot('accionBuscar')
        onkeyup="if(event.keyCode == 13) MakeRequestData('{{route('buscar-categorias')}}' + '/' + $(this).val() , '#tablePermisos', true)"
    @endslot

    @slot('contentTable')
        <div class="row">
            @include('categorias.data')
        </div>
    @endslot

</x-table>

@endsection
