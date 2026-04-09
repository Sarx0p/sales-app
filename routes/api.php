<?php

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('productos', ProductoController::class);
Route::apiResource('clientes', ClienteController::class)->only(['index', 'store']);
