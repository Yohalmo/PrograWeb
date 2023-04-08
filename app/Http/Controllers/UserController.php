<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public function Login(){
        return view('usuarios.login');
    }

    public function Registro(){
        return view('usuarios.registro');
    }
}
