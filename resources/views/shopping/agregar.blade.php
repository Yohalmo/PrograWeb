<x-card-modal>
    @slot('titulo')
        {{$Producto->ProductoNombre}}
    @endslot

    @slot('body')

    <style>

        .btn-shopping-modal{
            width: 70px !important;
            height: 45px;
            color: black;
            text-align: center;
            border: none;
        }

        .input-shopping{
            width: 70px !important;
            height: 45px;
            color: black;
            text-align: center;
            border-radius: 10px 0 0 10px;
        }

        .border-left{
            border-radius: 0 10px 10px 0;
        }
    </style>

    <form id="FrmProduct" method="POST" novalidate>
        @csrf
        <div>
            <input type="hidden" name="producto" id="producto" value="{{$Producto->IdProducto}}">

            <div class="row">

                <div class="col-xl-6 col-md-6 col-sm-12">
                    <img class="img-fluid" src="{{ url($Producto->ProductoImagen) }}" style="max-height: 250px"
                        alt="{{ $Producto->ProductoNombre }}">
                </div>

                <div class="col-xl-6 col-md-6 col-sm-12">
                    <p class=" text-black mt-1 mb-3" style="text-align: justify;">{{$Producto->ProductoDescripcion}}</p>

                    <div class="card shadow-none">
                        <div class="card-header pt-0 pb-0">
                            <div class="card-title text-black m-0"><strong>Precio $ {{$Producto->ProductoPrecio}}</strong></div>
                        </div>

                        <div class="card-body text-center">
                            <div class="text-black mb-2"><strong>CANTIDAD</strong></div>

                            <div class="d-flex justify-content-center">

                                <input type="text" onfocus="$(this).attr('readonly', true)"
                                        onfocusout="$(this).attr('readonly', false)"
                                        id="cantidad" name="cantidad"
                                        class="input-shopping" value="{{ $request->cantidad ?? 1 }}" min="0">

                                <button class="btn-shopping-modal btn-success" type="button"
                                    onclick="calcular(true)">
                                    <i class="fas fa-plus"></i>
                                </button>

                                <button class="btn-shopping-modal btn-danger border-left" type="button"
                                    onclick="calcular(false)">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>

                        <div class="card-footer text-end text-black">
                           <strong>Total: $ <span id="TotalProducto">{{ number_format($Producto->ProductoPrecio * ($request->cantidad ?? 1), 2)}}</span></strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @endslot

    @slot('footer')
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
            &nbsp;
            Cancelar</button>

        <button type="button" class="btn text-white" style="background-color: #8A2723"
            @if (isset($request->cantidad))
                onclick="MakeRequestData( '{{ route('edit-car-shopping') }}',
                '{{$request->contenedor}}', true, '#modal-principal', 'POST', 3, '#FrmProduct', false, true, [], EditShopping)"
            @else
                onclick="MakeRequestData( '{{ route('add-shopping') }}',
                '#div-notificaciones', true, '#modal-principal', 'POST', 2, '#FrmProduct', false, true)"
            @endif
            >
            &nbsp;&nbsp;&nbsp;Guardar
        </button>
    @endslot

</x-card-modal>


<script>

    var precio = {{ $Producto->ProductoPrecio }};

    function calcular(sumar){
        let cantidad = parseInt($('#cantidad').val());

        if(sumar){
            cantidad++;
        }else{
            if(cantidad == 1){ return; }
            cantidad--;
        }

        let total = precio * cantidad;
        $('#TotalProducto').html(total.toFixed(2));
        $('#cantidad').val(cantidad);
    }
</script>
