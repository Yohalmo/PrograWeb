<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermisssionController extends Controller
{
    public function index(Request $request)
    {
        $permissions = $this->GetInfo($request);
        return view('permission.index', compact('permissions'));
    }

    public function Buscar(Request $request){
        $permissions = $this->GetInfo($request);
        return view('permission.data', compact('permissions'));
    }

    private function GetInfo($request){
        $data = Permission::orderby('name');

        if($request->busqueda){
            $data->where('name', 'like', "%$request->busqueda%");
        }

        return $data->paginate(20)->withPath(route('buscar-privilegios') . "?busqueda=$request->busqueda" );
    }

    public function ShowModal(Request $request){

        if($request->Id == 0){
            $Info = new Permission();
        }else{
            $Info = Permission::find($request->Id);
        }

        return view('permission.modal-add', compact('Info', 'request'));
    }

    public function SaveInfo(Request $request){

        if($request->id == 0){
            $Info = new Permission();
            $Info->guard_name = 'web';
        }else{
            $Info = Permission::find($request->id);
        }

        $Info->name = $request->nombre;
        $Info->description = $request->descripcion;
        $Info->save();

        return view('permission.data', ['rows' => [$Info]]);
    }
}
