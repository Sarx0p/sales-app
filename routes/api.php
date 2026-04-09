<?php

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;

Route::apiResource('productos', ProductoController::class);
Route::apiResource('clientes', ClienteController::class)->only(['index', 'store']);
