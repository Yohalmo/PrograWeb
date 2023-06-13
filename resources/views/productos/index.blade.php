@extends('templates.MainTemplate', ['navbarView' => 'navbar-productos'])

@section('body')

    <div hidden class="link-consulta">{{route('search-products')}}</div>

    <div class="col-11 m-auto d-none" id="TabBusqueda">
        <div class="row" id="lstBusqueda"></div>
    </div>

    <div class="col-11 m-auto" id="TabInicial">
        <div class="text-black mb-2"><strong>Categorias</strong></div>

        <ul class="nav nav-pills mb-3 lista-horizontal" id="pills-tab"  role="tablist">
            @foreach ($categorias as $i => $item)
                <li class="nav-item px-1" role="presentation">
                    <button class="small nav-link {{ ((!$categoria && $i == 0) || ($item->IdCategoria == $categoria)) ? 'active' : '' }} category-item"
                         id="pills-categorias{{$item->IdCategoria}}-tab"
                        data-bs-toggle="pill" data-bs-target="#pills-categorias{{$item->IdCategoria}}"
                        type="button" role="tab" aria-controls="pills-categorias{{$item->IdCategoria}}"
                        categoria="{{$item->IdCategoria}}" aria-selected="true"><strong>{{ $item->NombreCategoria }}</strong></button>
                </li>
            @endforeach
        </ul>

        <div class=" mb-4 bg-black" style="height: 2px"></div>

        <div class="col-11 m-auto">
            <div class="tab-content" id="pills-tabContent">
                @foreach ($categorias as $index => $item)
                    <div class=" row tab-pane fade {{ ((!$categoria && $index == 0) || ($item->IdCategoria == $categoria)) ? 'active show' : '' }}"
                        id="pills-categorias{{$item->IdCategoria}}" role="tabpanel"
                        aria-labelledby="pills-categorias{{$item->IdCategoria}}-tab">

                        <div class="row contentPager" id="category-content-{{$item->IdCategoria}}"
                            link="#category-content-{{$item->IdCategoria}}">
                            @include('productos.products-itemtab', ['mostrar' => ((!$categoria && $index == 0) || ($item->IdCategoria == $categoria))])
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
