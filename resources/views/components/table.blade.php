<div class="card p-0 {{$clasesCard ?? ''}}" id="{{ $idCardTable ?? 'card-table' }}">
    <div class="card-header">
        <h3 class="card-title"> {{ $titulo ?? ''}} </h3>
    </div>
    <div class="card-body">
        @if (isset($bodyInfo))
            {{$bodyInfo}}
        @endif

        <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
            <div class="dataTable-top">
                <div class="dataTable-dropdown">
                    @if (isset($filtros))
                        <select class="form-control dataTable-selector" id="OpcionBuscar">
                            @foreach ($filtros as $item)
                                <option value="{{$item[0]}}">{{$item[1]}}</option>
                            @endforeach
                        </select>
                    @endif

                    @if (isset($btnAdicionales))
                        <button class="btn btn-colorGB" onclick="{{$btnAdicionales}}" title="Nuevo" id="Nuevo">
                            <i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Nuevo
                        </button>
                    @elseif(isset($linkAdicionales))
                        <a class="btn btn-colorGB" href="{{$linkAdicionales}}" title="Nuevo" id="Nuevo">
                            <i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Nuevo
                        </a>
                    @endif

                    @if (isset($btnsAdicionales))
                        {{$btnsAdicionales}}
                    @endif
                </div>
                @isset($accionBuscar)
                    <div class="dataTable-search">
                        <input type="text" id="{{ $IdBuscar ?? "Buscador"}}" class="form-control dataTable-input" placeholder="Buscar..." {{$accionBuscar ?? ""}} >
                    </div>
                @endisset
            </div>
            <div class="dataTable-container table-responsive {{$DivTableClass ?? ''}}"  style="{{$DivTableStyle ?? ''}}">
                @csrf
                <table id="datatablesSimple" class="table table-bordered ">
                    <thead>
                        <tr>
                            {{$header}}
                        </tr>
                    </thead>

                    <tbody id="{{ $idTabla ?? 'TableBody'}}" class="contentPager"
                     link="#{{ $idTabla ?? 'TableBody'}}">
                        {{$body}}
                    </tbody>
                </table>
            </div>
            @if (isset($paginador))
                {{$paginador}}
            @endif
        </div>
    </div>
</div>
