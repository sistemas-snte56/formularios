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
        return back()->with('success_search','Datos encontrados.')
                     ->with('npersonal',$usuario->npersonal);
        
    }

    public function show(Request $request)
    {

        // if (!$request->has('npersonal') || empty($request->input('npersonal')) || !is_numeric($request->input('npersonal'))) {
        //     return redirect()->route('home') // Redirige a la página principal si no se pasa correctamente
        //         ->with('error', 'El número personal debe ser proporcionado a través del formulario.');
        // }

        // $npersonal = $request->input('npersonal');
        // $usuarios = Usuario::where('npersonal',$npersonal)->get();
        // return view('search.show', compact('usuarios'));



        // Verificar si la solicitud tiene un parámetro 'npersonal' en la URL
        // y si proviene de un formulario y no directamente desde la URL
        if (!$request->has('npersonal') || empty($request->input('npersonal')) || !is_numeric($request->input('npersonal'))) {
            return redirect()->route('registro.index') // Redirige a la página principal si no se pasa correctamente
                ->with('error', 'El número personal debe ser proporcionado a través del formulario.');
        }

        // Obtener el npersonal desde la solicitud GET
        $npersonal = $request->input('npersonal');

        // Buscar usuarios con el npersonal dado
        $usuarios = Usuario::where('npersonal', $npersonal)->get();

        // Verificar si se encontró algún usuario
        if ($usuarios->isEmpty()) {
            return redirect()->route('registro.index') // Redirigir en caso de no encontrar usuario
                ->with('error', 'No se encontró el usuario con ese número personal.');
        }

        // Si npersonal es válido y existe un usuario, muestra la vista con los usuarios
        return view('search.show', compact('usuarios'));
                
    }
}
