<?php

namespace App\Livewire;


use Livewire\Component;
use App\Models\Participante;  // Asegúrate de que el modelo esté bien configurado
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class BuscarDiploma extends Component
{
    public $rfc;
    public $participante;
    public $errorMessage = '';
    
    // Usar el layout predeterminado de Laravel
    // protected $layout = 'layouts.app'; 
    
    
    protected $rules = [
        'rfc' => 'required|regex:/^[A-Z]{4}[0-9]{6}[A-Z0-9]{3}$/', // Asegúrate de usar una expresión regular válida para RFC
    ];

    public function BuscarRFC()
    {

        // info('Buscando RFC: ' . $this->rfc);

        
        $this->validateOnly('rfc');
        
        // Buscar al participante por RFC
        $this->participante = Participante::where('rfc', $this->rfc)->first();

        //   $maestro->nombre = mb_strtoupper($request->input('nombre'),'UTF-8');


        
        


        if ($this->participante) {

            $this->errorMessage = '';
        } else {
            $this->errorMessage = 'No se encontró un participante con este RFC.';
        }
    }

    public function descargarDiploma()
    {
        info($this->participante);

        $name = $this->participante->nombre.' '.
        $this->participante->apaterno.' '.
        $this->participante->amaterno;
        $name = mb_convert_encoding($name, 'UTF-8', 'UTF-8');


        info($this->participante->nombre);
        info($this->participante->apaterno);
        info($this->participante->amaterno);

        info($name);



        // Datos para pasar a la vista
        $data = [
            'title' => 'Mi primer PDF con DomPDF',
            'content' => 'Este es un contenido de ejemplo con caracteres especiales como ñ, á, ü.'
        ];

        // Asegurarse de que los datos estén en UTF-8
        $data['title'] = mb_convert_encoding($data['title'], 'UTF-8');
        $data['content'] = mb_convert_encoding($data['content'], 'UTF-8');
        

        // Cargar una vista y pasarle los datos
        $pdf = PDF::loadView('diplomas.pdfs.template', $data);

        // Descargar el PDF generado
        return $pdf->download('mi_primer_pdf.pdf');
        
        


        /*

            // // Generar el PDF con el nombre del participante
            // $data = [
            //     // 'nombre' => $this->participante->nombre,
            //     'nombre' => $this->participante->nombre,
            //     'apaterno' => $this->participante->apaterno,
            //     'amaterno' => $this->participante->amaterno,
            //     'telefono' => $this->participante->telefono,
            //     'rfc' => $this->participante->rfc,
            //     'slug' => $this->participante->slug,
            // ];

            // // info($this->participante->apaterno);

            // // $pdf = PDF::loadView('diplomas.pdfs.diploma', compact('data'));
            
            // // return $pdf->stream();

            
            // // $name = $this->participante ;

            // // $name = collect((array) $this->participante)->map(function ($value) {
            // //     return is_string($value) ? mb_convert_encoding($value, 'UTF-8', 'UTF-8') : $value;
            // // })->toArray();




            // // $name = $this->participante->toArray();

            // $name = [
            //     'nombre' => $this->participante->nombre,
            //     'apaterno' => $this->participante->apaterno,
            //     'amaterno' => $this->participante->amaterno,
            //     'rfc' => $this->participante->rfc,
            //     // agrega los que necesites
            // ];
            


            // $name = array_map(function ($value) {
            //     return is_string($value) ? mb_convert_encoding($value, 'UTF-8', 'UTF-8') : $value;
            // }, $name);
            
            // // $pdf = PDF::loadView('diplomas.pdfs.diploma', ['name' => $name]);

            
                    
            // $pdf = Pdf::loadHTML("<h1>Hello</h1>");
            // return $pdf->download('aaa.pdf');

        
            // // info($name);
            
            // // $pdf = PDF::loadView('diplomas.pdfs.diploma', compact('name'));



            // /*
            // $pdf = PDF::loadView('usuario.pdf.index', compact('maestro'))
            //     ->setPaper('letter','portrait')
            //     ->setOption(['dpi' => 200, 'defaultFont' => 'Helvetica'])
            //     ->setWarnings(false)
            //     ->save('constancia.pdf');
            // return $pdf->stream();   

            // 
            // // return $pdf->download("diploma_{$this->participante->slug}.pdf");

        */

    }

    public function render()
    {
        return view('livewire.buscar-diploma');
    }
}
