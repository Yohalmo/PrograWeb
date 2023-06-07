@foreach($permissions as $row)
    <tr id="permission-{{$row->id}}">
        <td>{{ $row->name }}</td>
        <td> {{ $row->description }}</td>
        <td>
            <button onclick="MakeRequestData( '{{ route('admin.permission-modal') }}', '.modal-content', true,
            '#modal-principal', 'POST', 2, '', false, false, ['Id/{{$row->id}}', 'Accion/3','Contenedor/permission-{{$row->id}}'])"
            class="btn btn-datatable btn-icon me-2" title="Editar"><i class="fas fa-edit"></i></button>


            <button type="button" class="btn btn-datatable btn-icon me-2" title="Eliminar" onclick="MakeRequestData( '{{ route('admin.delete-permission', [$row->id]) }}',
            '#permission-{{$row->id}}', true, '', 'GET', 3)">
               <i class="fas fa-trash"></i>
           </button>

        </td>
    </tr>
@endforeach

@include('home.paginador', ['Datos' => $permissions, 'cols' => 4])
