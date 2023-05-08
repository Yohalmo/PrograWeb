@foreach($categorias as $row)
    <tr id="categoria-{{$row->IdCategoria}}">
        <td class="align-middle text-center">{{$row->IdCategoria}}</td>
        <td class="text-center">
            <img class="img-fluid" src="{{ url($row->ImagenCategoria) }}"
                alt="{{ $row->NombreCategoria }}" width="200">
        </td>
        <td class="align-middle text-center"> {{ $row->NombreCategoria }}</td>
        <td>
            <button onclick="MakeRequestData( '{{ route('category-modal') }}', '.modal-content', true,
            '#modal-principal', 'POST', 2, '', false, false, ['Id/{{$row->IdCategoria}}', 'Accion/3','Contenedor/categoria-{{$row->IdCategoria}}'])"
            class="btn btn-datatable btn-icon me-2" title="Editar"><i class="fas fa-edit"></i></button>
        </td>
    </tr>
@endforeach

@include('home.paginador', ['Datos' => $categorias, 'cols' => 3])
