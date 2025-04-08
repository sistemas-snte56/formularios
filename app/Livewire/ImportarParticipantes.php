<?php
// namespace App\Imports;
namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Curso;
use App\Models\Participante;
use Illuminate\Support\Facades\Storage;

class ImportarParticipantes extends Component
{
    use WithFileUploads;

    public $archivo;
    public $curso_id;

    public function render()
    {
        return view('livewire.importar-participantes', [
            'cursos' => Curso::all(),
        ]);
    }

    public function importar()
    {
        $this->validate([
            'archivo' => 'required|file|mimes:csv,txt',
            'curso_id' => 'required|exists:cursos,id',
        ]);

        $path = $this->archivo->store('csv_imports');

        if (($handle = fopen(storage_path('app/' . $path), 'r')) !== false) {
            $header = fgetcsv($handle, 1000, ',');

            while (($data = fgetcsv($handle, 1000, ',')) !== false) {
                $row = array_combine($header, $data);
                
                // Convertir todos los valores a UTF-8
                $row = array_map(fn($value) => mb_convert_encoding($value, 'UTF-8', 'ISO-8859-1'), $row);
                // dd($row);

                if (!$row || count($row) !== count($header)) {
                    $this->error('❌ Error en la combinación de encabezado y fila. Verifica el archivo CSV.');
                    continue;
                }
                $participante = Participante::updateOrCreate(
                    ['rfc' => $row['rfc']],
                    [
                        'nombre'     => $row['nombre'],
                        'apaterno'   => $row['apaterno'],
                        'amaterno'   => $row['amaterno'],
                        'genero'     => $row['genero'],
                        'email'      => $row['email'],
                        'telefono'   => $row['telefono'],
                        'ct'         => $row['ct'],
                        'cargo'      => $row['cargo'],
                        'nivel'      => $row['nivel'],
                        'curp'       => $row['curp'],
                        'folio'      => $row['folio'],
                        'slug'       => $row['slug'],
                    ]
                );

                if (!$participante->cursos()->where('curso_id', $this->curso_id)->exists()) {
                    $participante->cursos()->attach($this->curso_id);
                }
            }

            fclose($handle);
        }

        session()->flash('mensaje', 'Participantes importados correctamente.');
        $this->reset(['archivo', 'curso_id']);
    }
}
