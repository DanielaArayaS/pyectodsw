<?php

use App\Http\Controllers\ProyectoController;

Route::get('/proyectos', [ProyectoController::class, 'index']);
Route::get('/proyectos/crear', [ProyectoController::class, 'create']);
Route::post('/proyectos', [ProyectoController::class, 'store']);
Route::get('/proyectos/{id}', [ProyectoController::class, 'show']);
Route::get('/proyectos/{id}/editar', [ProyectoController::class, 'edit']);
Route::put('/proyectos/{id}', [ProyectoController::class, 'update']);
Route::delete('/proyectos/{id}', [ProyectoController::class, 'destroy']);
