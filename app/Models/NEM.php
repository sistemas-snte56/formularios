<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NEM extends Model
{
    use HasFactory;

    protected $table = "n_e_m_s";

    protected $fillable = [
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
    ];

}
