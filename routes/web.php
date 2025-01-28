<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TemaController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DelegacionController;
use App\Http\Controllers\SearchController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', [RegistroController::class, 'index'])->name('registro');
Route::resource('/',RegistroController::class)->names('registro');
// Route::get('/usuario/buscar',[SearchController::class, 'index'])->name('usuario.buscar');
Route::get('buscar/usuario',[SearchController::class,'buscar'])->name('buscar');
Route::get('usuario/show/', [SearchController::class, 'show'])->name('usuario.show');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    route::resource('admin/delegaciones', DelegacionController::class)->names('delegacion');
    route::resource('admin/temas', TemaController::class)->names('tema');
});
