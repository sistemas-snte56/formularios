<?php

namespace App\Models;

use App\Models\Participante;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Curso extends Model
{
    use HasFactory;

    protected $table ="cursos";
    protected $fillable = ['nombre','horas'];

    // Relación muchos a muchos
    public function participantes()
    {
        return $this->belongsToMany(Participante::class, 'curso_participante', 'curso_id', 'participante_id');
    }
}