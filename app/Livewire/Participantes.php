<?php

namespace App\Livewire;

use App\Models\Curso;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Participante;
use Livewire\WithPagination;

class Participantes extends Component
{

    use WithPagination;

    public $nombre, $apaterno, $amaterno, $genero, $email, $telefono, $rfc, $slug;
    public $curso_id = [];
    public $editando = false;
    public $participante_id;
    
    
    protected $rules = [
        'nombre' => 'required|string|max:255',
        'apaterno' => 'required|string|max:255',
        'amaterno' => 'nullable|string|max:255',
        'genero' => 'required|in:Hombre,Mujer',
        'email' => 'required|email|unique:participantes,email',
        'telefono' => 'nullable|string|max:15',
        'rfc' => 'required|string|max:13|unique:participantes,rfc',
        'curso_id' => 'required|array',
        'curso_id' => 'required|exists:cursos,id',
    ];
    
    
    public function render()
    {
        // $cursos = Curso::all(); // Lista de cursos para seleccionarlos
        return view('livewire.participantes',[
            'participantes' => Participante::with('cursos')->paginate(10),
            'cursos' => Curso::all()
        ]);
    }

    public function store()
    {

        // $this->validate();


        if (!is_array($this->curso_id)) {
            $this->curso_id = [$this->curso_id]; // Convierte en array si es un string
        }



        $this->slug = Str::slug($this->nombre.'-'.$this->apaterno.'-'.$this->amaterno);

        $participante = Participante::create([
            // 'curso_id' => $this->curso_id,
            'rfc' => mb_strtoupper($this->rfc,'UTF-8'),
            'nombre' => mb_strtoupper($this->nombre,'UTF-8'),
            'apaterno' => mb_strtoupper($this->apaterno,'UTF-8'),
            'amaterno' => mb_strtoupper($this->amaterno,'UTF-8'),
            'genero' => $this->genero,
            'email' => $this->email,
            'telefono' => $this->telefono,
            'cargo' => 'empty',
            'nivel' => 'empty',
            'folio' => 'SNT56-2025-' . mb_strtoupper(substr(uniqid(), -5)),
            'slug' => $this->slug,
            'codigo_id' => sprintf(
                "%04s-%04s-%04s-%04s",
                substr(uniqid(), 0, 4),
                substr(uniqid(), 4, 4),
                substr(uniqid(), 8, 4),
                substr(uniqid(), 12, 4)
            ),
        ]);
        
        // Asociar el participante con el curso en la tabla intermedia
        $participante->cursos()->attach($this->curso_id);

        session()->flash('message', 'Participante creado exitosamente.');
        $this->reset();

        
        info(gettype($this->curso_id)); // Ver qué tipo de dato está recibiendo
        info($this->curso_id); // Ver si es string o array

    }

    public function edit($id)
    {
        $this->editando = true;
        $participante = Participante::findOrFail($id);
        $this->participante_id = $participante->id;
        $this->nombre = $participante->nombre;
        $this->apaterno = $participante->apaterno;
        $this->amaterno = $participante->amaterno;
        $this->genero = $participante->genero;
        $this->email = $participante->email;
        $this->telefono = $participante->telefono;
        $this->rfc = $participante->rfc;
        
        // Obtener los cursos en los que está inscrito el participante
        $this->curso_id = $participante->cursos->pluck('id')->toArray(); // Array con los IDs de cursos
        
    }

    public function update()
    {
        $this->validate();

        $participante = Participante::findOrFail($this->participante_id);
        $participante->update([
            'nombre' => $this->nombre,
            'apaterno' => $this->apaterno,
            'amaterno' => $this->amaterno,
            'genero' => $this->genero,
            'email' => $this->email,
            'telefono' => $this->telefono,
            'rfc' => $this->rfc,
            'curso_id' => $this->curso_id,
        ]);

        session()->flash('message', 'Participante actualizado exitosamente.');
        $this->reset();
    }

    public function delete($id)
    {
        $participante = Participante::findOrFail($id);
        $participante->delete();

        session()->flash('message', 'Participante eliminado exitosamente.');
    }

    public function resetInputFields()
    {
        $this->reset(['nombre', 'apaterno', 'amaterno', 'genero', 'email', 'telefono', 'rfc', 'curso_id']);
    }    
}

/*


        return view('livewire.regiones-page', [
            'regiones' =>Region::where("region",  "like", "%$this->search%")
                                ->orWhere("sede", "like", "%$this->search%")
                                ->paginate(25)
        ]);

*/