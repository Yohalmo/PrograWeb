<?php

namespace App\Http\Controllers;

use App\Mail\MailMailable;
use App\Models\Usuario;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $rows = Usuario::paginate(20)->withPath(route('buscar-usuarios'));
        return view('usuarios.index', [ 'rows' => $rows]);
    }

    public function Login(){
        return view('auth.login');
    }

    public function Registro(){
        return view('auth.registro');
    }

    public function SaveUserInfo(Request $request){
        $UrlBack = route('user.index');
        $usuario = Usuario::find($request->usuario);
        $enviarMail = false;

        if(!isset($usuario->IdUsuario)){
            $usuario = new Usuario();
            $User = Usuario::where('CorreoUsuario', $request->correo)->first();

            if(isset($User->CorreoUsuario)){
                return response()->json('^Ya existe un usuario con ese correo', 500);
            }

            $usuario->EstadoUsuario = 0;
            $usuario->TokenUsuario = md5(uniqid($request->correo, true));
            $UrlBack = route('login') . '|personalizado|¡Usuario creado exitosamente! Revise su correo para la activación|success';
            $enviarMail = true;
        }

        $usuario->NombresUsuario = $request->nombres;
        $usuario->ApellidosUsuario = $request->apellidos;
        $usuario->TelefonoUsuario = $request->telefono;
        $usuario->DireccionUsuario = $request->direccion;
        $usuario->CorreoUsuario = $request->correo;

        if(isset($request->password) && strlen($request->password) > 0){
            $usuario->PasswordUsuario = password_hash($request->password, PASSWORD_DEFAULT);
        }

        if(isset($request->roles)){
            $usuario->roles()->sync($request->roles);
        }

        $usuario->save();

        if($enviarMail){
            $datos = ['url' => route('verificar-usuario') . "?token=$usuario->TokenUsuario",
            'usuario' => $usuario->NombresUsuario];
            Mail::to($request->correo)->send(new MailMailable('Verificación de correo', 'verificacion', $datos));
        }

        return $UrlBack;
    }

    public function VerificarUsuario(Request $request){
        Usuario::where('TokenUsuario', $request->token)->update(['TokenUsuario' => '', 'EstadoUsuario' => 1]);
        return redirect(route('home'));
    }

    public function DesahabilitarUsuario(Request $request){

        $item = Usuario::find($request->id);
        $item->EstadoUsuario = $request->estado;
        $item->save();
        return view('usuarios.data', ['rows' => [$item]]);
    }

    public function Buscar($palabra = ''){
        $rows = Usuario::where(DB::raw('concat(NombresUsuario, " ", ApellidosUsuario)'), 'like', "%$palabra%")
        ->orwhere('CorreoUsuario', 'like', "%$palabra%")
        ->paginate(20)->withPath(route('buscar-usuarios', [$palabra]));

        return view('usuarios.data', compact('rows'));
    }

    public function edit($id)
    {
        return view('usuarios.edit',[
            'row'   => Usuario::find($id),
            'roles' => Role::all(),
        ]);
    }
}
