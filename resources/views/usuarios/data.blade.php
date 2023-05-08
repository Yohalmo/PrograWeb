
@foreach($rows as $row)
    <tr id="user-{{$row->IdUsuario}}">
        <td>{{ $row->NombresUsuario . ' ' . $row->ApellidosUsuario }}</td>
        <td>{{ $row->CorreoUsuario }}</td>
        <td class="text-wrap" style="max-width: 500px;">
            @if($row->roles->isNotEmpty())
                @foreach($row->roles as $role)
                {{$role->name}}
                @endforeach
            @endif
        </td>
        <td>

                <a href="{{ route('user.edit', $row->IdUsuario) }}" class="btn btn-datatable btn-icon me-2" title="Editar">
                    <i class="fas fa-edit"></i>
                </a>

                <button {{-- class="btn btn-{{$row->EstadoUsuario ? 'success' : 'danger'}}" --}} class="btn text-{{$row->EstadoUsuario ? 'success' : 'danger'}} btn-datatable btn-icon me-2"
                    data-toggle="tooltip" data-placement="top" title="Habilitar /  Deshabilitar"
                    onclick="MakeRequestData( '{{route('user-estado')}}', '#user-{{$row->IdUsuario}}', true, '', 'POST', 3, '',
                        true, false, ['NeedAsk/#alertUser' , 'id/{{$row->IdUsuario}}', 'estado/{{ $row->EstadoUsuario ? 0 : 1 }}'])">
                    <i class="fas fa-toggle-{{$row->EstadoUsuario ? 'on' : 'off'}}"></i>
                </button>

        </td>
    </tr>
@endforeach

@include('home.paginador', ['Datos' => $rows, 'cols' => 4])
