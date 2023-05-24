@extends('templates.MainTemplate', ['noNavbar' => 'inicio-page', 'classContent' => ''])

@section('body')


<div class="carrucel-container">

    <img src="{{asset('images/banner.jpg')}}" alt="" class="carrucel">
    <img src="{{asset('images/comedor.jpg')}}" alt="" class="carrucel d-none">
    <img src="{{asset('images/sofas.jpg')}}" alt="" class="carrucel d-none">

    <div class="indicator-container d-flex justify-content-center">
        <div class="carrucel-indicators text-center">
            <span class="indicator active"></span>
            <span class="indicator"></span>
            <span class="indicator"></span>
        </div>
    </div>
</div>

<div class="col-xl-9 col-md-10 col-sm-11 m-auto mt-5">

    <div class="card  m-auto shadow-sm p-2" id="card-nosotros">
        <div class="card-body">
            <h1 class="text-center"><strong>Acerca de nostros</strong></h1>

            <div class="div-nosotros">Somos una empresa que fabricamos todo tipo de muebles en madera de la mejor clase, utilizando los mejores materiales para el buen diseño, contamos con servicio en todo el pais. Nuestro compromiso es satisfacer sus necesidades conforme a sus gustos.</div>
        </div>
    </div>

    <h1 class="text-black mt-5"><strong>Productos destacados</strong></h1>

    <div class="row">

        @foreach ($productos as $item)
            <div class="col-xl-4 col-md-6 col-sm-12 mb-3">
                <div class="card card-producto shadow-sm">
                    <img class="card-img-top img-card-producto" height="165" src="{{asset($item->ProductoImagen)}}" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-color-main">{{$item->ProductoNombre}}</h5>
                        <p class="card-text descripcion-producto">{{ $item->ProductoDescripcion}}</p>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="col-12 text-end">
            <button class="btn-mas">Ver más...</button>
        </div>
    </div>


    <h1 class="text-black mt-5"><strong>Nuestras categorias</strong></h1>

    <div class="row mb-5">
        @foreach ($categorias as $item)


            <div class="col-xl-4 col-md-6 col-sm-12 mb-3">

                <div class="card card-category">
                    <div class="row no-gutters">
                        <div class="col-md-4"><img class="img-fluid img-category" src="{{ url($item->ImagenCategoria) }}" alt="{{$item->NombreCategoria}}"></div>
                        <div class="col-md-8">
                            <div class="card-body card-body-container">
                                <h5 class="card-title text-black"><strong>{{$item->NombreCategoria}}</strong></h5>
                                <p>
                                    50 productos
                                </p>
                                <button class="bg-black text-white mt-auto ms-auto
                                            button-container text-center pe-3 ps-3">
                                    <i class="fas fa-arrow-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        @endforeach

        <div class="col-12 text-end">
            <button class="btn-mas">Ver más...</button>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    <link rel="stylesheet" href="{{asset('css/landing-page.css')}}">
    <script src="{{asset('js/landing-page.js')}}"></script>
@endsection
