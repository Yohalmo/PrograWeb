
<x-card-modal>
    @slot('titulo')
        Información de la categoria
    @endslot

    @slot('body')

    <form id="FrmCategory" method="POST" novalidate>
        @csrf
        <div>
            <input type="hidden" class="form-control d-none" name="categoria" id="categoria" value="{{$Info->IdCategoria}}">

            <div class="row">

                <div class="col-lg-12">
                    <div class="mb-3">
                        <label class="form-label">Imagen</label>
                        <input name="imagen" id="imagen" type="file" required class="form-control previsualizar-imagen"
                        img-view="img-category"/>
                    </div>
                </div>

                <div id="img-category" class="div-previsualizar"></div>

                <div class="col-lg-12">
                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input name="nombre" id="nombre" required class="form-control" value="{{$Info->NombreCategoria}}"/>
                    </div>
                </div>

            </div>
        </div>
    </form>
    @endslot

    @slot('footer')
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
            <i class="fas fa-times"></i> &nbsp;
            Cancelar</button>

        <button type="button" class="btn btn-success" onclick="MakeRequestData( '{{ route('save-category') }}',
         '#{{$request->Contenedor}}', true, '#modal-principal', 'POST', {{$request->Accion}}, '#FrmCategory', false, true)">
            <i class="fas fa-save"></i>&nbsp;&nbsp;&nbsp;Guardar
        </button>
    @endslot

</x-card-modal>


<script>
    $("#nombre").keyup(function(){
        var ta      =   $("#nombre");
        letras      =   ta.val().replace(/ /g, "-");
        ta.val(letras)
    });
</script>



