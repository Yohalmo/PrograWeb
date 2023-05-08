@foreach($roles as $row)
    <tr id="role-{{$row->id}}">
        <td>{{ $row->name }}</td>
        <td>{{ $row->description }}</td>
        <td>

            @can('role-edit')
                <a href="{{ route('role.edit' , [$row->id]) }}" class="btn btn-datatable btn-icon me-2" title="Editar"><i class="fas fa-edit"></i></a>
            @endcan

            @can('role-delete')
                <button class="btn btn-datatable btn-icon me-2" title="Eliminar"
                    onclick="MakeRequestData(
                    '{{route('role.destroy')}}', '#role-{{$row->id}}', true, '', 'POST',
                     3, '', false, false, ['NeedAsk/#lblConfirmacion', 'id/{{$row->id}}'])">
                    <i class="fas fa-trash"></i>
                </button>
            @endcan

        </td>
    </tr>
@endforeach

@include('home.paginador', ['Datos' => $roles, 'cols' => 3])
