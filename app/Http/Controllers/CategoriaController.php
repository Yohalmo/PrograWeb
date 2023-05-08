<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class CategoriaController extends Controller
{

    public function index(){
        $categorias = Categoria::paginate(10);
        return view('categorias.index', compact('categorias'));
    }

    public function ShowModal(Request $request){

        if($request->Id == 0){
            $Info = new Categoria();
        }else{
            $Info = Categoria::find($request->Id);
        }

        return view('categorias.modal-add', compact('Info', 'request'));
    }

    public function SaveInfo(Request $request){
        $categoria = ($request->categoria ? Categoria::find($request->categoria) : new Categoria());

        if(isset($request->imagen)){
            if(isset($categoria->ImagenCategoria)){
                Log::info("public/storage/$categoria->ImagenCategoria");
                Storage::delete(str_replace('storage', 'public', $categoria->ImagenCategoria));
                //Storage::delete("public/storage/app/$categoria->ImagenCategoria");
            }

            $categoria->ImagenCategoria = SubirImagen($request->imagen, 'categorias');
        }

        $categoria->NombreCategoria = $request->nombre;
        $categoria->save();

        return view('categorias.data', ['categorias' => [$categoria]]);
    }
}
