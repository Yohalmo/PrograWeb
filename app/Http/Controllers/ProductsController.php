<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\CategoriaProducto;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(){
        return view('productos.index');
    }

    public function listado(){
        $productos = Producto::paginate()->withPath(route('buscar->producto'));
        return view('productos.listado', compact('productos'));
    }

    public function Buscar(Request $request){
        $productos = Producto::where('ProductoNombre', 'like', "%$request->busqueda%")
        ->orwhere('ProductoDescripcion', 'like', "%$request->busqueda%")->paginate()
        ->withPath(route('buscar->producto') . "?busqueda=$request->busqueda");

        return view('productos.listado-item', compact('productos'));
    }

    public function SaveProduct(Request $request){

        $Producto = Producto::find($request->producto);

        if(!isset($Producto->IdProducto)){
            $Producto = new Producto();
        }

        $Producto->ProductoPrecio = $request->precio;
        $Producto->ProductoNombre = $request->nombre;
        $Producto->ProductoDescripcion = $request->descripcion;
        $Producto->ProductoEstado = $request->estado;
        $Producto->save();

        return view('productos.listado-item', ['productos' => [$Producto]]);
    }

    public function AddCategoryToProduct(Request $request){
        CategoriaProducto::insert(['IdCategoria' => $request->categoria, 'IdProducto' => $request->producto]);
    }

    public function RemoveCategoryProduct(Request $request){
        CategoriaProducto::where('IdProducto', $request->producto)
        ->where('IdCategoria', $request->categoria)->delete();
    }

    public function ProductByCategory(Request $request){
        $productos = Producto::where('IdCategoria', $request->categoria)->get();
        return view('productos.item-category', compact('productos'));
    }
}
