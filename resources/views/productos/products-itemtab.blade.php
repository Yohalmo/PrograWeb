@if ($mostrar)
    @foreach($productos as $indice => $producto)
        <div class="col-xl-4 col-md-6 col-sm-12 mb-4 mt-1 product-category-item">
            <div class="card card-producto shadow-sm">
                <img class="card-img-top img-card-producto" height="165" src="{{asset($producto->ProductoImagen)}}" alt="..."/>
                <div class="card-body">
                    <div class="row p-2">
                        <div class="col-10 p-0 m-0">
                            <h5 class="card-title text-color-main"><strong>{{$producto->ProductoNombre}}</strong></h5>
                            <p class="card-text descripcion-producto">{{ $producto->ProductoDescripcion}}</p>
                        </div>
                        <div class="col-2 p-0 m-0 text-center align-middle p-auto">
                            <div class="d-flex align-items-center" style="height: 100%">
                                <button class="button btn btn-success btn-agregar"
                                    onclick="MakeRequestData( '{{ route('modal-shopping') }}', '.modal-content', true,
                                    '#modal-principal', 'POST', 2, '', false, false, ['producto/{{$producto->IdProducto}}'])">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <div class="col-12">
        <div class="d-flex justify-content-end">
            <div class="mt-1 mb-0 ms-1">{!! $productos->links() !!}</div>
        </div>
    </div>
@endif
