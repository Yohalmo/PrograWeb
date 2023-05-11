<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\CategoriaProducto;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    public function index(){
        return view('productos.index');
    }

    public function ListaProductos(){
        $productos = Producto::paginate()->withPath(route('buscar-productos'));
        return view('productos.listado', compact('productos'));
    }

    public function Buscar(Request $request){
        $productos = Producto::where('ProductoNombre', 'like', "%$request->busqueda%")
        ->orwhere('ProductoDescripcion', 'like', "%$request->busqueda%")->paginate()
        ->withPath(route('buscar-productos') . "?busqueda=$request->busqueda");

        return view('productos.listado-item', compact('productos'));
    }

    public function ChangeStatus(Request $request){
        $producto = Producto::find($request->producto);
        $producto->ProductoEstado = ($producto->ProductoEstado ? 0 : 1);
        $producto->save();

        return view('productos.listado-item', ['productos' => [$producto]]);
    }

    public function SaveProduct(Request $request){

        $Producto = $request->producto ? Producto::find($request->producto) : new Producto();

        if(isset($request->imagen)){
            if(isset($Producto->ProductoImagen)){
                Storage::delete(str_replace('storage', 'public', $Producto->ProductoImagen));
            }

            $Producto->ProductoImagen = SubirImagen($request->imagen, 'productos');
        }

        $Producto->ProductoPrecio = $request->precio;
        $Producto->ProductoNombre = $request->nombre;
        $Producto->ProductoDescripcion = $request->descripcion;
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

    public function ShowModal(Request $request){
        $Info = $request->Id ? Producto::find($request->Id) : new Producto();
        return view('productos.modal-add', compact('Info', 'request'));
    }

    public function CategoriasAsignadas(Request $request){

        $producto = Producto::find($request->producto);

        $asignadas = Categoria::join('categorias_producto as cp', 'cp.IdCategoria', 'categorias.IdCategoria')
                    ->where('IdProducto', $request->producto)->get();

        $disponibles = Categoria::whereNotIn('IdCategoria', array_column($asignadas->toArray(), 'IdCategoria'))->get();

        return view('productos.categorias-asignadas', compact('request', 'disponibles', 'asignadas', 'producto'));
    }

    public function AsignarCategoria(Request $request){
        if($request->asignacion){
            CategoriaProducto::insert(['IdProducto' => $request->producto, 'IdCategoria' => $request->categoria]);
        }else{
            CategoriaProducto::where('IdProducto', $request->producto)
            ->where('IdCategoria', $request->categoria)->delete();
        }
    }
}
