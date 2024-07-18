<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonaController;

Route::apiResource('personas', PersonaController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/personas', function(){
    return 'Obteniendo Lista de Personas';
});

Route::get('/personas/{id}' , function(){
    return 'Obteniendo una persona';
});

Route::post('/personas', function(){
    return 'Creando Personas';
});

Route::put('/personas/{id}' , function(){
    return 'Modificando Persona';
});

Route::delete('/personas/{id}' , function(){
    return 'Eliminando Persona';
});
