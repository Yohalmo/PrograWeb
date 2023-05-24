@foreach ($categorias as $row)
    <div class="col-xl-3 col-md-6 col-sm-12 mb-3" id="categoria-{{ $row->IdCategoria }}">
        <div class="toast show" >
            <div class="toast-header">
                <div class="toast-title text-black"><strong class="me-auto">{{ $row->NombreCategoria }}</strong></div>
                <div class="ms-auto">
                    @if ($row->EstadoCategoria)
                        <span class="badge badge-success bg-success">Activo</span>
                    @else
                        <span class="badge badge-danger bg-danger">Inactivo</span>
                    @endif
                </div>
            </div>
            <div class="toast-body pb-0">
                <div class="img-category-list rounded me-2 text-center">
                    <img src="{{url($row->ImagenCategoria)}}" class="img-fluid" alt="{{ $row->NombreCategoria }}">
                </div>

                <div class="row">
                    <button class="btn {{ $row->EstadoCategoria ? 'btn-success' : 'btn-danger' }} text-white p-2 col-xl-6 col-md-6 col-sm-12"
                        onclick="MakeRequestData('{{route('cambiar-estado-categoria')}}', '#categoria-{{$row->IdCategoria}}', true, '', 'POST',
                        3, '', false, false, ['NeedAsk/#AlertUser', 'categoria/{{$row->IdCategoria}}'])">
                        <i class="fas fa-toggle-on"></i> &nbsp; Cambiar estado
                    </button>

                    <button
                        onclick="MakeRequestData( '{{ route('category-modal') }}', '.modal-content', true,
                        '#modal-principal', 'POST', 2, '', false, false, ['Id/{{ $row->IdCategoria }}', 'Accion/3','Contenedor/categoria-{{ $row->IdCategoria }}'])"
                        class="btn btn-warning p-2 col-xl-6 col-md-6 col-sm-12" title="Editar">
                        <i class="fas fa-edit"></i> &nbsp; Editar
                    </button>
                </div>
            </div>
        </div>
    </div>
@endforeach
