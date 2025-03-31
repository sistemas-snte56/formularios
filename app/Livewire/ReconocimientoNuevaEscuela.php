<?php

namespace App\Livewire;

use App\Models\NEM;
use Livewire\Component;

class ReconocimientoNuevaEscuela extends Component
{
    public $rfc;
    public $userData = null;

    public function buscarRFC()
    {
        $this->rfc = strtoupper($this->rfc);

        info($this->rfc);

        // Validar el RFC
        $this->validate([
            'rfc' => 'required|regex:/^[A-Z&Ñ]{4}[0-9]{6}[A-Z0-9]{3}$/',
        ], [
            'rfc.required' => 'El RFC es obligatorio.',
            'rfc.regex' => 'El formato del RFC no es válido. Ejemplo: AABJ920101HDF',
        ]);



        $this->userData = NEM::where('rfc',$this->rfc)->first();
        

        // Si no se encuentra el RFC
        if (!$this->userData) {
            session()->flash('error', 'RFC no encontrado.');
        }
    }

    
    public function downloadPdf()
    {

        // info($this->userData->rfc);



        // info("entrar al metodo");
        if ($this->userData) {
            // Crear la URL para descargar el PDF
            $pdfUrl = asset('assets/pdfs/nem_reconocimientos56/' . $this->userData->rfc . '.pdf');
            // info($pdfUrl);
    
            // Verifica si el archivo existe
            if (file_exists(public_path('assets/pdfs/nem_reconocimientos56/' . $this->userData->rfc . '.pdf'))) {
                // Redirige al navegador para iniciar la descarga
                return redirect()->to($pdfUrl);
            } else {
                session()->flash('error', 'PDF no encontrado para este RFC.');
            }
        } else {
            session()->flash('error', 'No se ha encontrado un usuario con este RFC.');
        }

        $this->userData = '';
    }


    public function render()
    {
        return view('livewire.reconocimiento-nueva-escuela');
    }
}
