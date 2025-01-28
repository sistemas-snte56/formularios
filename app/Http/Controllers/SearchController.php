<?php

namespace App\Http\Controllers;

use App\Models\Admin\Usuario;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
        return view('search.index');
    }

    public function buscar(Request $request)
    {
        $validation = $request->validate(['search'=>'required|numeric']);

        $npersonal = $request->input('search');
        
        # Si no se ingresa un término de búsqueda
        if (empty($npersonal)) {
            return back()->with('campo_vacio', 'Por favor ingrese un número de personal para buscar.');
        }
                
        # Realizar la búsqueda
        // $usuario = Usuario::where('npersonal', $npersonal)->get();   
        
        // if ($usuario->isEmpty()) {
            //     return back()->with('sin_datos', 'Sin resultados.');
            // }
            
        $usuario = Usuario::where('npersonal', $npersonal)->first();   
            
        if (!$usuario) {
            return back()->with('sin_datos', 'Sin resultados.');
        }

        // return back()->with(['success_search' => 'Información satisfactoria!'], ['codigo_id' => $usuario->codigo_id]);
        return back()->with('success_search','Información satisfactoria!')
                    ->with('codigo_id',$usuario->codigo_id);
        
    }

    public function show($codigo_id)
    {
        $usuario = Usuario::where('codigo_id',$codigo_id)->get();

        return $usuario;


        
        return view('search.show', compact('usuario'));

    }
}
