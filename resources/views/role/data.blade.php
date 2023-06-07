@foreach($rows as $row)
    <tr id="role-{{$row->id}}">
        <td>{{ $row->name }}</td>
        <td>{{ $row->description }}</td>
        <td>
            @can('admin-role-show')
                <a href="{{ route('admin.role.show' , [$row->id]) }}" class="btn btn-datatable btn-icon me-2" title="Ver"><i class="fas fa-eye"></i></a>
            @endcan

            @can('admin-role-edit')
                <a href="{{ route('admin.role.edit' , [$row->id]) }}" class="btn btn-datatable btn-icon me-2" title="Editar"><i class="fas fa-edit"></i></a>
            @endcan

            @can('admin-role-delete')
                <button class="btn btn-datatable btn-icon me-2" title="Eliminar"
                    onclick="MakeRequestData(
                    '{{route('admin.role.destroy')}}', '#role-{{$row->id}}', true, '', 'POST',
                     3, '', false, false, ['NeedAsk/#lblConfirmacion', 'id/{{$row->id}}'])">
                    <i class="fas fa-trash"></i>
                </button>
            @endcan

        </td>
    </tr>
@endforeach

@include('main.home.paginador', ['Datos' => $rows, 'cols' => 3])
