<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\EventosController;
use App\Http\Controllers\NoticiasController;
use App\Http\Controllers\InscritosController;

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
    return view('welcome');
});

Route::get('/dashboard', [HomeController::class, 'index'] 
)->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//eventos
Route::get('/eventos/listado', [EventosController::class,'index']
)->middleware(['auth', 'verified'])->name('listado_eventos');

Route::get('/eventos/registrar', [EventosController::class, 'form_registro']
)->middleware(['auth', 'verified'])->name('form_registro_eve');

Route::post('/eventos/registrar', [EventosController::class, 'registrar']
)->middleware(['auth', 'verified'])->name('registrar_eve');

Route::get('eventos/editar/{id}', [EventosController::class, 'form_edicion']
)->middleware(['auth', 'verified'])->name('editar_eve');

Route::post('eventos/editar/{id}', [EventosController::class, 'editar']
)->middleware(['auth', 'verified'])->name('editar_evento');

Route::get('eventos/eliminar/{id}', [EventosController::class, 'eliminar']
)->middleware(['auth', 'verified'])->name('eliminar_eve');

//noticias
Route::get('/noticias/listado', [NoticiasController::class,'index']
)->middleware(['auth', 'verified'])->name('listado_noticias');

//inscritos
Route::get('/inscritos/listado', [InscritosController::class,'index']
)->middleware(['auth', 'verified'])->name('listado_inscritos');



require __DIR__.'/auth.php';
