@extends('templates.MainTemplate')

@section('body')

<div class="card col-xl-10 col-md-10 col-sm-12 m-auto shadow-none">
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th class="text-center align-middle text-black">Producto</th>
                    <th class="text-center align-middle text-black">Nombre</th>
                    <th class="text-center align-middle text-black">Cantidad</th>
                    <th class="text-center align-middle text-black">Precio</th>
                    <th class="text-center align-middle text-black">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($ListaProductos as $item)
                    @php
                        $cantidad = $productos[$item->IdProducto]['cantidad'];
                        $Subtotal = $cantidad * $item->ProductoPrecio;
                        $Total += $Subtotal;
                    @endphp
                    <tr>
                        <td class="text-center align-middle">
                            <img src="{{ url($item->ProductoImagen) }}" alt="" width="150">
                        </td>
                        <td class="text-center align-middle">{{ $item->ProductoNombre }}</td>
                        <td class="text-center align-middle">{{ $cantidad }}</td>
                        <td class="text-center align-middle">$ {{ number_format($Subtotal, 2) }}</td>
                        <td class="text-center align-middle">
                            <button class="btn btn-danger p-2">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-black"><strong>No se han agregado productos</strong></td>
                    </tr>
                @endforelse
            </tbody>
            <tfoot>
                <tr>
                  <td class="text-center text-black"><strong>Total: </strong></td>
                  <td></td>
                  <td></td>
                  <td class="text-center text-black"><strong>$ {{ number_format($Total, 2) }}</strong></td>
                  <td></td>
                </tr>
              </tfoot>
        </table>
    </div>
</div>


@endsection
