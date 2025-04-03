<?php

namespace App\Models;

use App\Models\Curso;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Participante extends Model
{
    use HasFactory;

    protected $table = "participantes";
    protected $fillable = [
        'curso_id',
        'rfc',
        'nombre',
        'apaterno',
        'amaterno',
        'genero',
        'email',
        'telefono',
        'ct',
        'cargo',
        'nivel',
        'curp',
        'folio',
        'slug',
        'codigo_id',
        'codigo_qr',
    ];



    // Relación muchos a muchos
    public function cursos()
    {
        return $this->belongsToMany(Curso::class, 'curso_participante', 'participante_id', 'curso_id');
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class, 'curso_id');
    }
}
