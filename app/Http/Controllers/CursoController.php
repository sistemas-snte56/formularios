<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CursoController extends Controller
{
    //
    public function index()
    {
        return view('diplomas.cursos.index');
    }
}
