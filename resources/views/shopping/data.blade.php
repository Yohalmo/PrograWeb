<tr id="shooping-producto{{$item->IdProducto}}">
    <td class="text-center align-middle">
        <img src="{{ url($item->ProductoImagen) }}" alt="" width="150">
    </td>
    <td class="text-center align-middle">{{ $item->ProductoNombre }}</td>
    <td class="text-center align-middle">{{ $cantidad }}</td>
    <td class="text-center align-middle">$ <span class="subtotal-item">{{ number_format($Subtotal, 2) }}</span></td>
    <td class="text-center align-middle">
        <button class="btn btn-danger p-2"  aria-label="Eliminar"
        onclick="MakeRequestData('{{route('delete-shopping')}}', '#shooping-producto{{$item->IdProducto}}', true, '',
        'POST', 3, '', false, false, ['NeedAsk/#lblDeleteShopping', 'producto/{{$item->IdProducto}}'], EditShopping)">
            <i class="fas fa-trash"></i>
        </button>

        <button class="btn btn-warning p-2" aria-label="Modificar"
            onclick="MakeRequestData( '{{ route('modal-shopping') }}', '.modal-content', true,
                '#modal-principal', 'POST', 2, '', false, false, ['producto/{{$item->IdProducto}}',
                 'cantidad/{{ $cantidad }}', 'contenedor/#shooping-producto{{$item->IdProducto}}'])">
            <i class="fas fa-edit"></i>
        </button>
    </td>
</tr>
