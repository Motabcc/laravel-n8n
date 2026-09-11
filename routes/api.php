<?php
use App\Http\Controllers\ProdutoController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Cria automaticamente todas as rotas (index, store, show, update, destroy)
Route::apiResource('produtos', ProdutoController::class);