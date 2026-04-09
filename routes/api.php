<?php

use App\Http\Controllers\CategoriaController;
use Illuminate\Http\Request;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\MarcaController;
use Illuminate\Support\Facades\Route;


Route::apiResource('marcas', MarcaController::class);
Route::apiResource('categorias', CategoriaController::class);
Route::apiResource('productos', ProductoController::class);
Route::apiResource('clientes', ClienteController::class)->only(['index', 'store']);


