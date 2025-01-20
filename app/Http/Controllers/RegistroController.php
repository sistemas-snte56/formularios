<?php

namespace App\Http\Controllers;

use Log;
use App\Models\Registro;
use App\Models\Admin\Tema;
use Illuminate\Support\Str;
use App\Models\Admin\Genero;
use Illuminate\Http\Request;
use App\Models\Admin\Usuario;
use App\Models\Admin\Delegacion;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;


class RegistroController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    private $disk = "public";

    public function index()
    {
        $tema = Tema::findOrFail(1);
        // $generos = Genero::pluck('genero','id');
        // Pluck para obtener un array de ID => nombre
        $generos = Genero::pluck('genero', 'id')->toArray();

        return view('registro', compact('tema','generos'));
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

        $delegacion = Delegacion::where('id', $request->input('select_delegacion'))->first();

        $request->validate([
            // 'select_region' => ['required'],
            'select_delegacion' => ['required'],
            'select_genero' => ['required'],
            'nombre' => ['required'],
            'apellido_paterno' => ['required'],
            // // // 'email' => ['required','email|unique:usuarios,email'],
            // // // 'email' => ['required', 'email', 'unique:usuarios,email'],
            'rfc' => ['required', 'regex:/^[a-zA-Z]{4}[0-9]{6}[a-zA-Z0-9]{3}$/'],
            'numero_de_personal' => ['required','numeric'],
            'select_nivel_educativo' => ['required'],
            'email' => 'required|email|unique:usuarios,email|max:255',
            // 'email' => 'required|email',
            'telefono' => ['required','numeric','digits:10'],
            'talon' => 'required|mimes:pdf,jpg,png,jpeg|max:5120', // 5 MB máximo
            'ine_frontal' => 'required|mimes:pdf,jpg,png,jpeg|max:5120', // 5 MB máximo
            'ine_reverso' => 'required|mimes:pdf,jpg,png,jpeg|max:5120', // 5 MB máximo
            'formato' => 'required|mimes:pdf,jpg,png,jpeg|max:5120', // 5 MB máximo
        ]);


        // return $request->all();

        $talon = $request->file('talon');
        # cambiamos el nombre del archivo
        $nombreTalon = Str::slug($delegacion->region->region.'-'.$delegacion->deleg_delegacional.'-'.'talon_de_pago-'.$request->input('nombre').'-'.$request->input('apellido_paterno').'-'.$request->input('apellido_materno'));
        # generamos la ruta del archivo para guardarlo en la db
        $urlTalon = Storage::url($talon->storeAs('talones/'.$delegacion->region->region,$nombreTalon.".".$talon->extension(),$this->disk));


        $ine_anverso = $request->file('ine_frontal');
        # cambiamos el nombre del archivo
        $nombreIneAnverso = Str::slug($delegacion->region->region.'-'.$delegacion->deleg_delegacional.'-'.'ine_anverso-'.$request->input('nombre').'-'.$request->input('apellido_paterno').'-'.$request->input('apellido_materno'));
        # generamos la ruta del archivo para guardarlo en la db
        $urlIneAnverso = Storage::url($ine_anverso->storeAs('ine_anversos/'.$delegacion->region->region,$nombreIneAnverso.".".$ine_anverso->extension(),$this->disk));

        $ine_reverso = $request->file('ine_reverso');
        # cambiamos el nombre del archivo
        $nombreIneReverso = Str::slug($delegacion->region->region.'-'.$delegacion->deleg_delegacional.'-'.'ine_reverso-'.$request->input('nombre').'-'.$request->input('apellido_paterno').'-'.$request->input('apellido_materno'));
        # generamos la ruta del archivo para guardarlo en la db
        $urlIneReverso = Storage::url($ine_reverso->storeAs('ine_reversos/'.$delegacion->region->region,$nombreIneReverso.".".$ine_reverso->extension(),$this->disk));

        $formato = $request->file('formato');
        # cambiamos el nombre del archivo
        $nombreFormato = Str::slug($delegacion->region->region.'-'.$delegacion->deleg_delegacional.'-'.'formato-'.$request->input('nombre').'-'.$request->input('apellido_paterno').'-'.$request->input('apellido_materno'));
        # generamos la ruta del archivo para guardarlo en la db
        $urlFormato = Storage::url($formato->storeAs('formatos/'.$delegacion->region->region,$nombreFormato.".".$formato->extension(),$this->disk));

        try {
            $usuario = new Usuario();
            $usuario->id_delegacion = $request->input('select_delegacion');
            $usuario->id_tema = $request->input('tema');
            $usuario->nombre = mb_strtoupper($request->input('nombre'),'UTF-8');
            $usuario->apaterno = mb_strtoupper($request->input('apellido_paterno'),'UTF-8');
            $usuario->amaterno = mb_strtoupper($request->input('apellido_materno'),'UTF-8');
            $usuario->id_genero = $request->input('select_genero');
            $usuario->rfc = mb_strtoupper($request->input('rfc'),'UTF-8');
            $usuario->npersonal = $request->input('numero_de_personal');
            $usuario->nivel_educativo = $request->input('select_nivel_educativo');
            $usuario->email = $request->input('email');
            $usuario->telefono = $request->input('telefono');
            $usuario->folio = 'SNTE56-JDM25-' . mb_strtoupper(substr(uniqid(), -5));
            $usuario->codigo_id = sprintf(
                "%04s-%04s-%04s-%04s",
                substr(uniqid(), 0, 4),
                substr(uniqid(), 4, 4),
                substr(uniqid(), 8, 4),
                substr(uniqid(), 12, 4)
            );
    
            $slug = Str::slug($usuario->nombre.'-'.$usuario->apaterno.'-'.$usuario->amaterno);
    
            #Verificar si el slug ya existe y si es necesario agregar un sufijo único
            $originalSlug = $slug;
            $counter = 1;
            while (Usuario::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $counter;  #Agregar un sufijo si ya existe
                $counter++;
            }
            $usuario->slug = $slug;
            $usuario->talon = $urlTalon;
            $usuario->ine_frontal = $urlIneAnverso;
            $usuario->ine_reverso = $urlIneReverso;
            $usuario->formato = $urlFormato;
    
    
            $usuario->save();
            return redirect()->back()->with('success_registro', 'Usuario guardado.');

        } catch (\Exception $e) {
            // Puedes loguear el error para el análisis posterior
            // Log::error('Error al cargar el archivo: ' . $e->getMessage());

            // Enviar una respuesta personalizada al usuario
            return redirect()->back()->with('error_try', 'Ocurrió un error al cargar el archivo. ');

        }



        // dd($usuario);








            // $ine_anverso = $request->file('ine_frontal');
            // $nombreTalon = Str::slug($delegacion->region->region.'-'.$delegacion->deleg_delegacional.'-'.'ine_anverso-'.$request->input('nombre').'-'.$request->input('apellido_paterno').'-'.$request->input('apellido_materno'));

            // // return $talon->storeAs('/images',$nombreTalon.".".$talon->extension(),$this->disk);

            // $urlTalon = Storage::url($ine_anverso->storeAs('/images',$nombreTalon.".".$ine_anverso->extension(),$this->disk));

            // return $urlTalon;

            // $filePath = $request->file('ine_frontal')->store('uploads');
            // $filePath = $request->file('ine_reverso')->store('uploads');
            // $filePath = $request->file('talon')->store('uploads');



            // Generar un slug basado en el nombre completo





        /*
        // Verificar si el archivo fue subido correctamente
        if ($request->hasFile('talon') && $request->file('talon')->isValid()) {
            // Mover el archivo a la carpeta 'uploads' dentro de 'storage/app'
            $filePath = $request->file('talon')->store('uploads');



            return $filePath;

            $usuario = new Usuario();
            $usuario->id_delegacion = $request->input('select_delegacion');
            $usuario->id_tema = $request->input('tema');
            $usuario->nombre = mb_strtoupper($request->input('nombre'),'UTF-8');
            $usuario->apaterno = mb_strtoupper($request->input('apellido_paterno'),'UTF-8');
            $usuario->amaterno = mb_strtoupper($request->input('apellido_materno'),'UTF-8');
            $usuario->id_genero = $request->input('select_genero');
            $usuario->email = $request->input('email');
            $usuario->telefono = $request->input('telefono');
            $usuario->rfc = mb_strtoupper($request->input('rfc'),'UTF-8');

            $usuario->talon = $filePath;
            $usuario->save();

            // return back()->with('success', 'Archivo subido correctamente');
        } else {
            return back()->with('error', 'Hubo un problema al cargar el archivo');
        }*/


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
