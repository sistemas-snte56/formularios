<?php

namespace App\Http\Controllers;

use App\Models\Admin\Genero;
use App\Models\Registro;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('registro');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'select_region' => ['required'],
            'select_delegacion' => ['required'],
            'select_genero' => ['required'],
            'nombre' => ['required'],                        
            'apellido_paterno' => ['required'],  
            'telefono' => ['required','numeric','digits:10'],
            'email' => ['required','email'],
            'rfc' => ['required', 'regex:/^[a-zA-Z]{4}[0-9]{6}[a-zA-Z0-9]{3}$/'],
            // 'email' => ['required','email','unique:maestros,email,'.$maestro->id],
            // $maestro->nombre = mb_strtoupper($request->input('nombre'), 'UTF-8');
        ]);

        return $request;
    }

    /**
     * Display the specified resource.
     */
    public function show(Registro $registro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Registro $registro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Registro $registro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Registro $registro)
    {
        //
    }
}
