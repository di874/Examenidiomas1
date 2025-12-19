<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudianteController;

Route::get('/', function () {
    return view('welcome');
});

// CRUD completo de estudiantes
Route::resource('estudiantes', EstudianteController::class);

// Ruta personalizada para retirar estudiante
Route::patch('estudiantes/{id}/retirar', [EstudianteController::class, 'retirar'])->name('estudiantes.retirar');
