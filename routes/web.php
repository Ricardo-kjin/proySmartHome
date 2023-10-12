<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// RUTAS DISPOSITIVOS

Route::get('/dispositivos', [App\Http\Controllers\DispositivoController::class, 'index']);
Route::get('/dispositivos/create', [App\Http\Controllers\DispositivoController::class, 'create']);
Route::get('/dispositivos/{dispositivo}/edit', [App\Http\Controllers\DispositivoController::class, 'edit']);
Route::post('/dispositivos', [App\Http\Controllers\DispositivoController::class, 'store']);
Route::put('/dispositivos/{dispositivo}', [App\Http\Controllers\DispositivoController::class, 'update']);
Route::delete('/dispositivos/{dispositivo}', [App\Http\Controllers\DispositivoController::class, 'destroy']);

//RUTAS DE HORARIOS
Route::get('/horarios', [App\Http\Controllers\HorarioController::class, 'index']);
Route::get('/horarios/create', [App\Http\Controllers\HorarioController::class, 'create']);
Route::get('/horarios/{horario}/edit', [App\Http\Controllers\HorarioController::class, 'edit']);
Route::post('/horarios', [App\Http\Controllers\HorarioController::class, 'store']);
Route::put('/horarios/{horario}', [App\Http\Controllers\HorarioController::class, 'update']);
Route::patch('/horarios/{horario}', [App\Http\Controllers\HorarioController::class, 'actualizarestado']);
Route::delete('/horarios/{horario}', [App\Http\Controllers\HorarioController::class, 'destroy']);



