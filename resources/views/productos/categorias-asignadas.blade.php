

<x-card-modal>
    @slot('titulo')
        Categorias asignadas
    @endslot

    @slot('body')
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Categorias disponibles</div>
                    </div>
                    <div class="card-body" style="min-height: 300px" id="categorias-disponibles">
                        @foreach ($disponibles as $item)
                            <div class="card card-body" categoria="{{$item->IdCategoria}}">{{$item->NombreCategoria}}</div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Categorias asignadas</div>
                    </div>
                    <div class="card-body" style="min-height: 300px" id="categorias-asignadas">
                        @foreach ($asignadas as $item)
                            <div class="card card-body" categoria="{{$item->IdCategoria}}">{{$item->NombreCategoria}}</div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endslot

    @slot('footer')
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
            <i class="fas fa-times"></i> &nbsp;
            Cerrar</button>
    @endslot

</x-card-modal>


<script src="{{ asset("js/Sortable.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("js/sortable-jquery.js") }}" type="text/javascript"></script>


<script>
    $('#categorias-disponibles').sortable({
        group: {
            pull: true,
            put: true
        },
        animation: 150,
        easing: "cubic-bezier(0.895, 0.03, 0.685, 0.22)",
        chosenClass: "bg-primary",
        onAdd: (evento) => {
            MakeRequestData('{{route('asignar-categoria')}}', '', true, '', 'POST', 3, '', false, false,
            ['producto/{{$producto->IdProducto}}', `categoria/${$(evento.item).attr('categoria')}`, `asignacion/0`]);
        },
    });

    $('#categorias-asignadas').sortable({
        group: {
            pull: true,
            put: true
        },
        animation: 150,
        easing: "cubic-bezier(0.895, 0.03, 0.685, 0.22)",
        chosenClass: "bg-primary",
        onAdd: (evento) => {
            MakeRequestData('{{route('asignar-categoria')}}', '', true, '', 'POST', 3, '', false, false,
            ['producto/{{$producto->IdProducto}}', `categoria/${$(evento.item).attr('categoria')}`, `asignacion/1`]);
        },
    });
</script>



