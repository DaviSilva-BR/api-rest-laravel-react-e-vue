<?php

use App\Http\Controllers\Api\FornecedorController;
use App\Http\Controllers\Api\ProdutoController;
use App\Http\Controllers\Api\Usuario;
use App\Http\Controllers\Api\UsuarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('v3')->group(function () {
    Route::apiResource('usuario', UsuarioController::class);
});

Route::prefix('v4')->middleware('jwt.auth')->group(function () {
    Route::post('me', 'App\Http\Controllers\Api\AuthController@me');
    Route::post('logout', 'App\Http\Controllers\Api\AuthController@logout');
    Route::post('refresh', 'App\Http\Controllers\Api\AuthController@refresh');
    Route::apiResource('fornecedor', FornecedorController::class);
});

Route::prefix('v5')->group(function () {
    Route::apiResource('produtos', ProdutoController::class);
});
Route::post('login', 'App\Http\Controllers\Api\AuthController@login');
