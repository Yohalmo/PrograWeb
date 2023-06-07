<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function Login(){
        return view('usuarios.login');
    }

    public function Registro(){
        return view('usuarios.registro');
    }

    public function SaveUserInfo(Request $request){
        $usuario = Usuario::find($request->usuario);

        if(!isset($usuario->IdUsuario)){
            $usuario = new Usuario();
            $User = Usuario::where('CorreoUsuario', $request->correo)->first();

            if(isset($User->CorreoUsuario)){
                return response()->json('^Ya existe un usuario con ese correo', 500);
            }
        }

        $usuario->NombresUsuario = $request->nombres;
        $usuario->ApellidosUsuario = $request->apellidos;
        $usuario->TelefonoUsuario = $request->telefono;
        $usuario->DireccionUsuario = $request->direccion;
        $usuario->CorreoUsuario = $request->correo;
        $usuario->PasswordUsuario = Hash::make($request->password, PASSWORD_DEFAULT);
        $usuario->EstadoUsuario = 1;
        $usuario->save();
    }
}
