<?php

namespace App\Http\Controllers;

use App\Models\Admin\Region;
use Illuminate\Http\Request;
use App\Models\Admin\Delegacion;

class DelegacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $delegaciones = Delegacion::all();
        return view('admin.delegaciones.index',compact('delegaciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $regiones = Region::all()->mapWithKeys(function ($item) {
            return [$item->id => $item->region . ' - ' . $item->sede];
        })->toArray();
                
        return view('admin.delegaciones.create', compact('regiones'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'select_region' => ['required'],
            'delegacion' => ['required', 'unique:delegaciones,deleg_delegacional'],
            'nivel' => ['required'],
            'sede' => ['required'],
        ]);


        $delegacion = new Delegacion();
        $delegacion->id_region = $request->input('select_region');
        $delegacion->deleg_delegacional = mb_strtoupper($request->input('delegacion'),'UTF-8');
        $delegacion->nivel_delegacional = mb_strtoupper($request->input('nivel'),'UTF-8');
        $delegacion->sede_delegacional = mb_strtoupper($request->input('sede'),'UTF-8');
        $delegacion->save();
        

        // Guardar el nuevo registro
        // Delegacion::create([
        //     'id_region' => $request->input('select_region'),
        //     'deleg_delegacional' => mb_strtoupper($request->input('delegacion'),'UTF-8'),
        //     'nivel_delegacional' => mb_strtoupper($request->input('nivel'),'UTF-8'),
        //     'sede_delegacional' => mb_strtoupper($request->input('sede'),'UTF-8'),
        // ]);        

        return redirect()->route('delegacion.index')->with('success_delegacion','Registro guardado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Delegacion $delegacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Delegacion $delegacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Delegacion $delegacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Delegacion $delegacion)
    {
        //
    }
}
