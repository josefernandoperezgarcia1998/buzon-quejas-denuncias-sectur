<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BuzonController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\AutenticarController;
use App\Http\Controllers\BuzonLogController;
use App\Http\Controllers\UserLogsController;
use App\Http\Controllers\UsuarioController;


// Ruta principal, redirige al formulario
Route::get('/', [BuzonController::class, 'create'])->name('welcome');

// Rutas desglozadas tipo recurso para las acciones CRUD del buzón 
Route::get('buzon',[BuzonController::class, 'index'])->name('emails.index')->middleware('auth');
Route::get('formulario', [BuzonController::class, 'create'])->name('emails.create');
Route::post('send', [BuzonController::class, 'send'])->name('emails.send');
Route::get('buzon/{id}',[BuzonController::class, 'show'])->name('emails.show')->middleware('auth');
Route::put('buzon/{id}',[BuzonController::class, 'update'])->name('emails.update');
Route::delete('buzon/{id}',[BuzonController::class, 'destroy'])->name('emails.destroy');

// Ruta tipo recurso para Areas
Route::resource('areas', AreaController::class)->names('areas')->middleware('admin');

// Ruta con ajax para obtener toda la data de user-logs con datatables
Route::get('areas-logs-data', [AreaController::class, 'areasDatatables'])->name('areas-logs-data');

// Ruta con ajax para obtener toda la data con datatables
Route::get('buzon-data', [BuzonController::class, 'buzonDatatables'])->name('buzon-data');

/* Rutas para iniciar sesión y cerrar sesión */
Route::get('inicia-sesion', [AutenticarController::class, 'credenciales'])->name('login');
Route::post('validar', [AutenticarController::class, 'autenticar'])->name('validar');
Route::get('salir', [AutenticarController::class, 'salida'])->name('salir');

// Ruta recurso para crud users
Route::resource('users', UsuarioController::class)->names('users')->middleware('admin');

// Ruta con ajax para obtener toda la data de usuarios con datatables
Route::get('users-data', [UsuarioController::class, 'usersDatatables'])->name('users-data');

// Ruta resource para los user-logs
Route::resource('user-logs', UserLogsController::class)->names('user-logs');

// Ruta con ajax para obtener toda la data de user-logs con datatables
Route::get('user-logs-data', [UserLogsController::class, 'userLogsDatatables'])->name('user-logs-data');

// Ruta resource para el buzon-logs
Route::resource('buzon-logs', BuzonLogController::class)->names('buzon-logs');

// Ruta con ajax para obtener toda la data de user-logs con datatables
Route::get('buzon-logs-data', [BuzonLogController::class, 'buzonLogsDatatables'])->name('buzon-logs-data');