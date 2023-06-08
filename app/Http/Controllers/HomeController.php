<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function LandingPage(){

        $productos = Producto::all();
        $categorias = Categoria::whereNotNull('IdProducto')->where('EstadoCategoria', 1)
            ->leftjoin('categorias_producto as cp', 'cp.IdCategoria', 'categorias.IdCategoria')
            ->groupBy('categorias.IdCategoria')->get(['categorias.*', DB::raw('count(IdProducto) as productos')]);

        return view('home.landing-page', compact('productos', 'categorias'));
    }
}
