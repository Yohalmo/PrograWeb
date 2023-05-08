@extends('templates.MainTemplate')

@section('body')

<x-table>
    @slot('idTabla')
    tablePermisos
    @endslot

    @slot('titulo')
    Listado de permisos
    @endslot


    @slot('accionBuscar')
        onkeyup="if(event.keyCode == 13) MakeRequestData('{{route('buscar-privilegios')}}' + '?busqueda=' + $(this).val() , '#tablePermisos', true)"
    @endslot

    @slot('btnsAdicionales')
        <button class="btn main-color text-white" onclick="MakeRequestData( '{{ route('permission-modal') }}', '#principal-modal-content', true, '#modal-principal', 'POST', 2, '', false, false,
        ['Id/0', 'Accion/4','Contenedor/tablePermisos'])" title="Nuevo" id="Nuevo">
            <i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Nuevo
        </button>
    @endslot


    @slot('header')
        <th>NOMBRE</th>
        <th>DESCRIPCIÓN</th>
        <th style="width: 100px">ACCIONES</th>
    @endslot

    @slot('body')
        @include('permission.data')
    @endslot

</x-table>
@endsection
