<?php

use App\Livewire\BuscarDiploma;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NEMController;
use App\Http\Controllers\TemaController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DelegacionController;
use App\Http\Controllers\ParticipanteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('my-home');
});

// Route::get('/diplomados-evaluacion-formativa', BuscarDiploma::class);


Route::get('/diplomados-evaluacion-formativa', function () {
    return view('diplomas.diplomados-evaluacion-formativa');
})->name('diplomados-evaluacion-formativa');


// Route::get('/', [RegistroController::class, 'index'])->name('registro');
// route::resource('/',RegistroController::class)->names('registro');

// Route::get('buscar/usuario',[SearchController::class,'buscar'])->name('buscar');
// Route::get('usuario/show/', [SearchController::class, 'show'])->name('usuario.show');






route::get('reconocimientos_nem',[NEMController::class, 'show_nem'])->name('reconocimiento.nem');

// route::resource('/nem_constancias',NEMController::class)->names('nem');
route::get('/descargar-reconocimiento/{rfc}', function($rfc){
    $pdfPath = public_path('pdfs/nem_reconocimientos56'.$rfc.'pdf');

    // Verifica si el archivo existe
    if (file_exists($pdfPath)) {
        return response()->download($pdfPath);
    }

    return response()->json(['error' => 'Archivo no encontrado.'], 404);    
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    route::resource('admin/delegaciones', DelegacionController::class)->names('delegacion');
    route::resource('admin/temas', TemaController::class)->names('tema');

    route::get('/admin/cursos/',[CursoController::class,'index'])->name('cursos.index');
    route::get('/admin/participantes/',[ParticipanteController::class,'index'])->name('participantes.index');
});
