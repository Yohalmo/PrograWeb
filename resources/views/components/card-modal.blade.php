

<div class="card card-header-actions">

    <div class="card-header">
        <h4 class="card-title m-0">{{ $titulo }}</h4>
        <button class="btn-close" type="button" data-bs-dismiss="modal" data-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="card-body">
        {{ $body }}
    </div>
    <div class="card-footer text-end">
        @if (isset($cancel))
            <button type="button" class="btn grisUno ms-2" data-bs-dismiss="modal" data-dismiss="modal">
                <i class="fas fa-times"></i>&nbsp;&nbsp;&nbsp;Cancelar
            </button>
        @endif
        {{ $footer }}
    </div>

</div>
