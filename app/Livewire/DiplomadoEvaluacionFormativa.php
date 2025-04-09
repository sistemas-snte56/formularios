<?php

namespace App\Livewire;

use App\Models\Participante;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
// use Barryvdh\DomPDF\PDF;
use Livewire\Component;

class DiplomadoEvaluacionFormativa extends Component
{
    public function generarPDF()
    {
        /*
            $data = [
                'titulo' => 'Informa de participantes',
                'participantes' => Participante::all()->map(function ($participante) {
                    return [
                        'nombre' => $participante->nombre,
                        'apaterno' => $participante->apaterno,
                        'amaterno' => $participante->amaterno,
                        'telefono' => $participante->telefono,
                        'rfc' => $participante->rfc,
                        'fecha_registro' => $participante->created_at->format('d/m/Y'),
                    ];
                }),
            ];

        */

        $data = [
            'titulo' => 'Informe de participantes',
            'participantes' => Participante::all()->map(function ($participante) {
                $participante->nombre = mb_convert_encoding($participante->nombre, 'UTF-8');
                $participante->email = mb_convert_encoding($participante->email, 'UTF-8');
                return $participante;
            }),
        ];

        info($data);

        # Generamos el PDF con una vista de blade 
        $pdf = PDF::loadView('diplomas.pdf.informe-participantes', $data);

        # Descargamos el PDF
        return $pdf->download('informe-participantes.pdf');
    }
    public function render()
    {
        return view('livewire.diplomado-evaluacion-formativa');
    }
}
