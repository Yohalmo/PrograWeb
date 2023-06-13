<?php

namespace App\Http\Controllers;

use App\Models\Orden;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class ShoppingController extends Controller
{
    public function index(){

        $productos = Session::get('shooping-car', []);
        $ListaProductos = Producto::whereIn('IdProducto', array_keys($productos))->get();
        $Total = 0;

        return view('shopping.index', compact('productos', 'ListaProductos', 'productos', 'Total'));
    }

    public function Envio(){
        $productos = Session::get('shooping-car', []);

        if(count($productos) == 0){
            return redirect(route('home'));
        }

        return view('shopping.solicitud');
    }

    public function AddProductModal(Request $request){
        $Producto = Producto::find($request->producto);
        return view('shopping.agregar', compact('Producto', 'request'));
    }

    public function AddProductShopping(Request $request){

        $productos = Session::get('shooping-car', []);
        $producto = Producto::find($request->producto);

        if(!$producto->ProductoEstado){
            return response()->json('^El producto seleccionado ya no esta disponible', 500);
        }

        if(isset($productos[$request->producto])){
            $productos[$request->producto]['cantidad'] += $request->cantidad;
        }else{
            $productos[$request->producto]['cantidad'] = $request->cantidad;
        }

        Session::put('shooping-car', $productos);

        return view('home.notificacion-item');
    }

    public function EditShoppingCar(Request $request){

        $productos = Session::get('shooping-car', []);
        $productos[$request->producto]['cantidad'] = $request->cantidad;
        Session::put('shooping-car', $productos);
        $item = Producto::find($request->producto);

        $cantidad = $request->cantidad;
        $Subtotal = $cantidad * $item->ProductoPrecio;

        if($request->cantidad){
            return view('shopping.data', compact('item', 'cantidad', 'Subtotal'));
        }
    }

    public function DeleteShopping(Request $request){
        $productos = Session::get('shooping-car', []);
        unset($productos[$request->producto]);
        Session::put('shooping-car', $productos);
    }

    public function SaveOrder(Request $request){
        return DB::transaction(function () use($request) {

            $productos = Session::get('shooping-car', []);
            $ListaProductos = Producto::whereIn('IdProducto', array_keys($productos))->get();

            $orden = new Orden();
            $orden->FechaOrden = date('Y-m-d H:i:s');
            $orden->IdUsuario = Session::get('user-info')->IdUsuario;
            $orden->ComentarioOrden = $request->comentario;
            $orden->EstadoOrden = 1;
            $orden->save();

            $total = 0;
            $detalleProductos = [];

            foreach($ListaProductos as $item){
                $producto = $productos[$item->IdProducto];
                $totalProducto = $producto['cantidad'] * $item->ProductoPrecio;
                $total += $totalProducto;

                $detalleProductos[] = ['IdProducto' => $item->IdProducto, 'PrecioTotal' => $totalProducto,
                'CantidadProducto' => $producto['cantidad'], 'PrecioUnitario' => $item->ProductoPrecio,
                'IdOrden' => $orden->IdOrden];
            }

            Session::forget('shooping-car');
            $orden->TotalOrden = $total;
            $orden->save();

            return "Orden guardada exitosamente|" . route('home');
        });

    }
}
