<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BuzonController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\UsuarioController;


// Ruta principal, redirige al formulario
Route::get('/', [BuzonController::class, 'create'])->name('welcome');

// Ruta desglozada tipo recurso para las acciones CRUD del buzón 
Route::get('buzon',[BuzonController::class, 'index'])->name('emails.index');
Route::get('formulario', [BuzonController::class, 'create'])->name('emails.create');
Route::post('send', [BuzonController::class, 'send'])->name('emails.send');
Route::get('buzon/{id}',[BuzonController::class, 'show'])->name('emails.show');
Route::put('buzon/{id}',[BuzonController::class, 'update'])->name('emails.update');
Route::delete('buzon/{id}',[BuzonController::class, 'destroy'])->name('emails.destroy');

// Ruta tipo recurso para Areas
Route::resource('areas', AreaController::class)->names('areas');

// Ruta tipo recurso para Usuarios
Route::resource('usuarios', UsuarioController::class)->names('usuarios');

// Ruta con ajax para obtener toda la data con datatables
Route::get('buzon-data', [BuzonController::class, 'buzonDatatables'])->name('buzon-data');