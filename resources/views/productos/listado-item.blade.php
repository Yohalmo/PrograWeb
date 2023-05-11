@foreach($productos as $row)
    <tr id="producto-{{$row->IdProducto}}">
        <td class="text-center">
            <img class="img-fluid" src="{{ url($row->ProductoImagen) }}"
                alt="{{ $row->ProductoNombre }}" width="200">
        </td>
        <td class="align-middle text-center"> {{ $row->ProductoNombre }}</td>
        <td class="align-middle text-center">$ {{ $row->ProductoPrecio }}</td>
        <td class="align-middle text-center">
            @if ($row->ProductoEstado)
                <span class="badge badge-success bg-success">Activo</span>
            @else
                <span class="badge badge-danger bg-danger">Inactivo</span>
            @endif
        </td>
        <td class="text-center align-middle">
            <button class="btn btn-success text-white p-2 me-2"
                onclick="MakeRequestData('{{route('cambiar-estado-producto')}}', '#producto-{{$row->IdProducto}}', true, '', 'POST',
                3, '', false, false, ['NeedAsk/#AlertUser', 'producto/{{$row->IdProducto}}'])">
                <i class="fas fa-toggle-on"></i>
            </button>

            <button onclick="MakeRequestData( '{{ route('product-modal') }}', '.modal-content', true,
            '#modal-principal', 'POST', 2, '', false, false, ['Id/{{$row->IdProducto}}', 'Accion/3','Contenedor/producto-{{$row->IdProducto}}'])"
            class="btn btn-warning p-2 me-2" title="Editar"><i class="fas fa-edit"></i></button>

            <button onclick="MakeRequestData( '{{ route('modal-asignacion') }}', '.modal-content', true,
            '#modal-principal', 'POST', 2, '', false, false, ['producto/{{$row->IdProducto}}', 'Accion/3','Contenedor/producto-{{$row->IdProducto}}'])"
            class="btn btn-primary p-2 me-2" title="Categorias"><i class="fas fa-code-branch"></i></button>

        </td>
    </tr>
@endforeach

@include('home.paginador', ['Datos' => $productos, 'cols' => 5])
