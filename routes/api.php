<?php

use App\Http\Controllers\RegistroController;
use App\Http\Controllers\SensorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('registro', [RegistroController::class, 'store']);
Route::get('sensor/status/visualizar', [SensorController::class, 'visualizar']);
Route::put('sensor/status/atualizar', [SensorController::class, 'atualizar']);
Route::get('sensor/status/listar', [SensorController::class, 'listar']);
