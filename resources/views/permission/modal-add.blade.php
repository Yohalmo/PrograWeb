
<x-card-modal>
    @slot('titulo')
        Información del permiso
    @endslot

    @slot('body')

    <form id="FrmPregunta" method="POST" novalidate>
        @csrf
        <div>
            <input type="hidden" class="form-control d-none" name="id" id="id" value="{{$Info->id}}">

            <div class="row">

                <div class="col-lg-12">
                    <div class="mb-3">
                        <label class="form-label text-black">Nombre</label>
                        <input name="nombre" id="nombre" required class="form-control" value="{{$Info->name}}"/>
                    </div>
                </div>


                <div class="col-lg-12">
                    <div class="mb-3">
                        <label class="form-label text-black">Descripción</label>
                        <textarea name="descripcion" id="descripcion" class="form-control" rows="3" required>{{$Info->description}}</textarea>
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

        <button type="button" class="btn btn-success" onclick="MakeRequestData( '{{ route('save-permission') }}',
         '#{{$request->Contenedor}}', true, '#modal-principal', 'POST', {{$request->Accion}}, '#FrmPregunta', false, true)">
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



