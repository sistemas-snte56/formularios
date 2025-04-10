<?php

namespace App\Http\Controllers;

use App\Models\Participante;
use Illuminate\Http\Request;
// use Barryvdh\DomPDF\Facade as PDF;

use Barryvdh\DomPDF\Facade\PDF;



class ConsultarDiplomaController extends Controller
{
    public function index()
    {
        return view('diplomas.home');
    }

    public function download($folio)
    {

        $participante = Participante::where('folio',$folio)->first();

        $pdf = PDF::loadView('diplomas.pdfs.diploma-pdf', compact('participante'))
        ->setPaper('letter','landscape');

        return $pdf->stream();
    }
}
