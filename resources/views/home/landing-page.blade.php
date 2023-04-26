@extends('templates.MainTemplate')

@section('body')

<div>
    <img src="{{asset('images/banner.jpg')}}" alt="" class="carrucel">
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
        <div class="col-xl-4 col-md-6 col-sm-12">
            <div class="card card-producto shadow-sm">
                <img class="card-img-top img-card-producto" height="165" src="{{asset('images/juguetera.jpg')}}" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-color-main">Juguetera tallada</h5>
                    <p class="card-text descripcion-producto">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et</p>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 col-sm-12">
            <div class="card card-producto shadow-sm">
                <img class="card-img-top img-card-producto" height="165" src="{{asset('images/comedor.jpg')}}" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-color-main">Comedor tapizados</h5>
                    <p class="card-text descripcion-producto">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et</p>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 col-sm-12">
            <div class="card card-producto shadow-sm">
                <img class="card-img-top img-card-producto" height="165" src="{{asset('images/sofas.jpg')}}" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-color-main">Sofas</h5>
                    <p class="card-text descripcion-producto">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et</p>
                </div>
            </div>
        </div>
        <div class="col-12 text-end">
            <button class="btn-mas">Ver más...</button>
        </div>
    </div>


    <h1 class="text-black mt-5"><strong>Nuestras categorias</strong></h1>

    <div class="row mb-5">

        <div class="col-xl-4 col-md-6 col-sm-12">
            <div class="card">
                <div class="row no-gutters">
                    <div class="col-md-4"><img class="img-fluid" src="{{ asset('images/comedor.jpg')}}" alt="..."></div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Comedores</h5>
                            <div class="">
                                50 productos
                                <button class="bg-black text-white"
                                style="position: absolute;
                                bottom: 0;
                                right: 0;"><i class="fas fa-arrow-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 col-sm-12">
            <div class="card">
                <div class="row no-gutters">
                    <div class="col-md-4"><img class="img-fluid" src="{{ asset('images/comedor.jpg')}}" alt="..."></div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Comedores</h5>
                            <div>
                                50 productos
                                <button class="bg-black text-white mt-auto ms-auto"><i class="fas fa-arrow-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 col-sm-12">
            <div class="card">
                <div class="row no-gutters">
                    <div class="col-md-4"><img class="img-fluid" src="{{ asset('images/comedor.jpg')}}" alt="..."></div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Comedores</h5>
                            <div>
                                50 productos
                                <button class="bg-black text-white mt-auto ms-auto"><i class="fas fa-arrow-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 text-end">
            <button class="btn-mas">Ver más...</button>
        </div>
    </div>
</div>

@endsection
