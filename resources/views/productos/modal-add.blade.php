<x-card-modal>
    @slot('titulo')
        Información del producto
    @endslot

    @slot('body')

    <form id="FrmProduct" method="POST" novalidate>
        @csrf
        <div>
            <input type="hidden" class="form-control d-none" name="producto" id="producto" value="{{$Info->IdProducto}}">

            <div class="row">

                <div class="col-lg-12">
                    <div class="mb-3">
                        <label class="form-label text-black">Imagen</label>
                        <input name="imagen" id="imagen" type="file" class="form-control previsualizar-imagen"
                        img-view="img-product"/>
                    </div>
                </div>

                <div id="img-product" class="div-previsualizar mb-3">
                    @if (isset($Info->ProductoImagen))
                        <img class="img-fluid" src="{{ url($Info->ProductoImagen) }}"
                        alt="{{ $Info->ProductoNombre }}">
                    @endif
                </div>

                <div class="form-group col-xl-6 col-md-6 col-sm-12 mb-3">
                    <label class="form-label text-black">Nombre</label>
                    <input name="nombre" id="nombre" required class="form-control" value="{{$Info->ProductoNombre}}"/>
                </div>

                <div class="form-group col-xl-6 col-md-6 col-sm-12 mb-3">
                    <label class="form-label text-black">Precio</label>
                    <input name="precio" id="precio" required class="form-control" value="{{$Info->ProductoPrecio}}"/>
                </div>

                <div class="form-group col-12 mb-3">
                    <label class="form-label text-black">Descripción</label>
                    <textarea name="descripcion" id="descripcion" cols="30" rows="10" class="form-control">{{$Info->ProductoDescripcion}}</textarea>
                </div>

            </div>
        </div>
    </form>
    @endslot

    @slot('footer')
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
            <i class="fas fa-times"></i> &nbsp;
            Cancelar</button>

        <button type="button" class="btn btn-success" onclick="MakeRequestData( '{{ route('save-product') }}',
         '#{{$request->Contenedor}}', true, '#modal-principal', 'POST', {{$request->Accion}}, '#FrmProduct', false, true)">
            <i class="fas fa-save"></i>&nbsp;&nbsp;&nbsp;Guardar
        </button>
    @endslot

</x-card-modal>
