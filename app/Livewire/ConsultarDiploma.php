<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Participante;

class ConsultarDiploma extends Component
{
    public $rfc;
    public $participante;

    protected $rules = [
        'rfc' => 'required|regex:/^[A-ZÑ&]{3,4}\d{6}[A-Z0-9]{3}$/', // Aquí va la validación del RFC
    ];    

    public function submit()
    {
        $this->validate();

        $this->participante = Participante::where('rfc', $this->rfc)->first();

        if (!$this->participante) {
            // Si no se encuentra el RFC, puedes mostrar un mensaje de error
            session()->flash('error', 'Participante no encontrado. Verifica el RFC e intenta nuevamente.');
            return;
        }

        // Si encontramos al participante, mostramos el mensaje de éxito
        session()->flash('message', 'Participante encontrado. ¡Puedes descargar tu diploma!');

    }

    public function render()
    {
        return view('livewire.consultar-diploma');
    }
}
