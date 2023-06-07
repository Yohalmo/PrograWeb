@extends('templates.MainTemplate')
@section('pretittle', 'Vista general')
@section('tittle', 'Permisos')
@section("scripts")

@endsection

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

    @slot('btnAdicionales')
        MakeRequestData( '{{ route('permission-modal') }}', '.modal-content', true, '#modal-principal', 'POST', 2, '', false, false,
        ['Id/0', 'Accion/@if(count($permissions) == 0) 2 @else 4 @endif','Contenedor/tablePermisos'])
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
