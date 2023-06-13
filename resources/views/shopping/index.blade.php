@extends('templates.MainTemplate')

@section('body')

<div class="card col-xl-10 col-md-10 col-sm-12 m-auto shadow-none">
    <div class="card-body">
        <h1 class="text-center align-middle">Carrito de Compras</h1>
        <label for="" hidden id="lblDeleteShopping">¿Esta seguro que quiere eliminar este producto?</label>

        <div class="table-responsive">
            <table class="table ">
                <thead>
                    <tr>
                        <th class="text-center align-middle">Producto</th>
                        <th class="text-center align-middle">Nombre</th>
                        <th class="text-center align-middle">Cantidad</th>
                        <th class="text-center align-middle">Precio</th>
                        <th class="text-center align-middle">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($ListaProductos as $item)
                        @php
                            $cantidad = $productos[$item->IdProducto]['cantidad'];
                            $Subtotal = $cantidad * $item->ProductoPrecio;
                            $Total += $Subtotal;
                        @endphp
                        @include('shopping.data')
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
                    <td class="text-center text-black"><strong>$ <span class="total-shopping">{{ number_format($Total, 2) }}</span></strong></td>
                    <td></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>


@endsection
