<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function LandingPage(){

        $productos = Producto::all();
        $categorias = Categoria::all();
        return view('home.landing-page', compact('productos', 'categorias'));
    }
}
