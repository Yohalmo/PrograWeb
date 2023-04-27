<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(){
        return view('productos.index');
    }
    public function Producto(){
        return view('productos.index');
    }
}


