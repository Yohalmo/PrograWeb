<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function LandingPage(){

        $productos = Producto::limit(6)->orderby(DB::raw('rand()'))->get();

        $categorias = Categoria::whereNotNull('IdProducto')->where('EstadoCategoria', 1)
            ->leftjoin('categorias_producto as cp', 'cp.IdCategoria', 'categorias.IdCategoria')
            ->groupBy('categorias.IdCategoria')->orderby(DB::raw('rand()'))->limit(3)
            ->get(['categorias.*', DB::raw('count(IdProducto) as productos')]);

        return view('home.landing-page', compact('productos', 'categorias'));
    }
}
