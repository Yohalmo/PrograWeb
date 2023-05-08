@extends('templates.MainTemplate')

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
            onkeyup="if(event.keyCode == 13) MakeRequestData('{{route('buscar-roles')}}' + '/' + $(this).val() , '#tablePermisos', true)"
        @endslot

        @slot('linkAdicionales',route('role.create'))


        @slot('header')
            <th>NOMBRE</th>
            <th>DESCRIPCIÓN</th>
            <th style="width: 150px">ACCIONES</th>
        @endslot

        @slot('body')
            @include('role.data')
        @endslot

    </x-table>
    {{ $roles->render() }}
@endsection
