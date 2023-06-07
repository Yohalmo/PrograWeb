@extends('templates.MainTemplate')
@section('pretittle', 'Vista general')
@section('tittle', 'Roles')


@section('body')

<label id="lblConfirmacion" hidden class="d-none">¿Estas seguro que quieres eliminar el rol?</label>

    <x-table>
        @slot('idTabla')
        tablePermisos
        @endslot

        @slot('titulo')
        Listado de roles
        @endslot


        @slot('accionBuscar')
            onkeyup="if(event.keyCode == 13) MakeRequestData('{{route('admin.buscar-roles')}}' + '/' + $(this).val() , '#tablePermisos', true)"
        @endslot

        @can('admin-role-create')
            @slot('linkAdicionales',route('admin.role.create'))
        @endcan


        @slot('header')
            <th>NOMBRE</th>
            <th>DESCRIPCIÓN</th>
            <th style="width: 150px">ACCIONES</th>
        @endslot

        @slot('body')
            @include('main.role.data')
        @endslot

    </x-table>
    {{ $rows->render() }}
@endsection
