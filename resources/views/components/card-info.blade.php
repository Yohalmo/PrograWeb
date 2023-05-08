<div class="card">
    <div class="card-header col-12">
        <div class="d-flex align-items-center">
            @if (isset($backLink))
                <a class="main-color btn" href="{{$backLink}}">
                    <i class="fas fa-arrow-left"></i>&nbsp;&nbsp;&nbsp;Regresar
                </a>
            @else
                <button class="btn-colorGB btn" onclick="history.back()">
                    <i class="fas fa-arrow-left"></i>&nbsp;&nbsp;&nbsp;Regresar
                </button>
            @endif

            @if (isset($cardHeader))
                {{$cardHeader}}
            @else
                <span class="card-title m-0 ms-3"> {{isset($titulo) ? $titulo : ''}} </span>
            @endif
        </div>
    </div>
    <div class="card-body">
        {{$cardBody}}
    </div>
    @if (isset($cardFooter))
        <div class="card-footer">
            {{$cardFooter}}
        </div>
    @endif
</div>
