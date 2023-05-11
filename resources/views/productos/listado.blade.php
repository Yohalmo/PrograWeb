@extends('templates.MainTemplate')
@section('pretittle', 'Vista general')
@section('tittle', 'USUARIOS')
@section("scripts")

@endsection

@section('body')

<label hidden class="d-none" id="AlertUser">¿Esta seguro que quiere cambiar el estado de este producto?</label>

<x-table>
    @slot('idTabla')
    tableProductos
    @endslot

    @slot('titulo')
    Listado de productos
    @endslot

    @slot('btnsAdicionales')
        <button class="btn main-color text-white" onclick="MakeRequestData( '{{ route('product-modal') }}', '#principal-modal-content', true, '#modal-principal', 'POST', 2, '', false, false,
        ['Id/0', 'Accion/4','Contenedor/tableProductos'])" title="Nuevo" id="Nuevo">
            <i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Nuevo
        </button>
    @endslot

    @slot('accionBuscar')
        onkeyup="if(event.keyCode == 13) MakeRequestData('{{route('buscar-productos')}}' + '?busqueda=' + $(this).val() , '#tableProductos', true)"
    @endslot

    @slot('header')
        <th>Imagen</th>
        <th>Producto</th>
        <th>Precio</th>
        <th>Estado</th>
        <th style="width: 150px">Acciones</th>
    @endslot

    @slot('body')
        @include('productos.listado-item')
    @endslot

</x-table>

@endsection
