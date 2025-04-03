<?php

namespace App\Livewire;

use App\Models\Curso;
use Livewire\Component;
use Livewire\WithPagination;

class Cursos extends Component
{
    use WithPagination;

    public $nombre, $horas;
    public $editando = false;
    public $curso_id;

    protected $rules = [
        'nombre' => 'required|string|max:255',
        'horas' => 'required|string|max:50',
    ];

    public function render()
    {
        $cursos = Curso::paginate(10); // Aquí puedes configurar la paginación o la cantidad de cursos a mostrar
        return view('livewire.cursos', compact('cursos'));
    }

    public function store()
    {
        $this->validate();

        Curso::create([
            'nombre' => $this->nombre,
            'horas' => $this->horas,
        ]);

        session()->flash('message', 'Curso creado exitosamente.');
        $this->reset();
    }

    public function edit($id)
    {
        $this->editando = true;
        $curso = Curso::findOrFail($id);
        $this->curso_id = $curso->id;
        $this->nombre = $curso->nombre;
        $this->horas = $curso->horas;
    }

    public function update()
    {
        $this->validate();

        $curso = Curso::findOrFail($this->curso_id);
        $curso->update([
            'nombre' => $this->nombre,
            'horas' => $this->horas,
        ]);

        session()->flash('message', 'Curso actualizado exitosamente.');
        $this->reset();
    }

    public function delete($id)
    {
        $curso = Curso::findOrFail($id);
        $curso->delete();

        session()->flash('message', 'Curso eliminado exitosamente.');
    }

    public function resetInputFields()
    {
        $this->reset(['nombre', 'horas']);
    }
}
