@extends('templates.MainTemplate')

@section('body')


<div class="card col-x1-10 col-md-10 col-sm-12 m-auto shadow-none">
     <div class="card-body">
         <h1 class="text-center align-middle">Carrito de Compras</h1>
        <table class="table">
        <thead>
                <tr>
                    <th class="text-center align-middle">Producto</th>
                    <th class="text-center align-middle">Nombre</th>
                    <th class="text-center align-middle">Cantidad</th>
                    <th class="text-center align-middle">Precio</th>
                    <th class="text-center align-middle">Eliminar</th>
                </tr>
        </thead> 
            <tbody>
              
                <tr>
                    <td class="text-center align-middle">
                        <img src="{{asset('images/login-image.jpg')}}" alt="" width="150">
                    </td>
                    <td class="text-center align-middle">Sofa</td>
                    <td class="text-center align-middle">1</td>
                    <td class="text-center align-middle">$80.99</td>
                    <td class="text-center align-middle">
                        <button class="btn btn-danger p-2">
                            <i class="fas fa-trash"></i>
                        </button>           
                    </td>
                </tr>
                <tr>
                    <td class="text-center align-middle">
                        <img src="{{asset('images/login-image.jpg')}}" alt="" width="150">
                    </td>
                    <td class="text-center align-middle">Cama</td>
                    <td class="text-center align-middle">1</td>
                    <td class="text-center align-middle">$300.00</td>
                    <td class="text-center align-middle">
                        <button class="btn btn-danger p-2">
                            <i class="fas fa-trash"></i>
                        </button>           
                    </td>
                </tr>
                <tr>
                    <td class="text-center align-middle">
                        <img src="{{asset('images/login-image.jpg')}}" alt="" width="150">
                    </td>
                    <td class="text-center align-middle">Juego de Sala</td>
                    <td class="text-center align-middle">1</td>
                    <td class="text-center align-middle">$400.96</td>
                    <td class="text-center align-middle">
                        <button class="btn btn-danger p-2">
                            <i class="fas fa-trash"></i>
                        </button>           
                    </td>
                </tr>
                <tr>
                    <td class="text-center align-middle">
                        <img src="{{asset('images/login-image.jpg')}}" alt="" width="150">
                    </td>
                    <td class="text-center align-middle">Tocador</td>
                    <td class="text-center align-middle">1</td>
                    <td class="text-center align-middle">$150.99</td>
                    <td class="text-center align-middle">
                        <button class="btn btn-danger p-2">
                            <i class="fas fa-trash"></i>
                        </button>           
                    </td>
                </tr>
                <tr>
                    <td class="text-center align-middle">
                        <img src="{{asset('images/login-image.jpg')}}" alt="" width="150">
                    </td>
                    <td class="text-center align-middle">Sillas</td>
                    <td class="text-center align-middle">1</td>
                    <td class="text-center align-middle">$57.17</td>
                    <td class="text-center align-middle">
                        <button class="btn btn-danger p-2">
                            <i class="fas fa-trash"></i>
                        </button>           
                    </td>
                </tr>
                <tr>
                    <td class="text-center align-middle">
                        <img src="{{asset('images/login-image.jpg')}}" alt="" width="150">
                    </td>
                    <td class="text-center align-middle">Puerta</td>
                    <td class="text-center align-middle">1</td>
                    <td class="text-center align-middle">$300.95</td>
                    <td class="text-center align-middle">
                        <button class="btn btn-danger p-2">
                            <i class="fas fa-trash"></i>
                        </button>           
                    </td>
                </tr>
            </tbody>
            <tfoot>  
                <tr>
                    <td class="text-center">Total: </td>
                    <td></td>
                    <td></td>
                    <td class="text-center">$ 110.15 </td>
                    <td></td>
                </tr>
            </tfoof>
         </table>
    </div>
</div>
</html>

@endsection

@section('scripts')
<link rel="stylesheet" href="{{asset('css/carrito.css')}}">
.images{
    
}
@endsection