@extends('templates.MainTemplate')
@section('pretittle', 'Vista general')
@section('tittle', 'USUARIOS')
@section("scripts")

@endsection

@section('body')

<label hidden class="d-none" id="alertUser">¿Esta seguro que quiere habilitar / desahibilitar este usuario?</label>

<x-table>
    @slot('idTabla')
    tablePermisos
    @endslot

    @slot('titulo')
    Listado de usuarios
    @endslot


    @slot('accionBuscar')
        onkeyup="if(event.keyCode == 13) MakeRequestData('{{route('buscar-usuarios')}}' + '/' + $(this).val() , '#tablePermisos', true)"
    @endslot

    @slot('header')
        <th>Nombre</th>
        <th>Email</th>
        <th>Roles</th>
        <th style="width: 150px">Acciones</th>
    @endslot

    @slot('body')
        @include('usuarios.data')
    @endslot

</x-table>

@endsection
