<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;

use App\Http\Controllers\UserController;
Route::get('/', function () {
    return view('welcome');
});

//rota::metodo('onde',[classe,'metodo_classe'])
Route::get('/user/{id}',[UserController::class,'show']);
//rota com middleware
//rota::metodo('onde',[classe,'metodo_classe'])->middleware('auth');
//pra ver o proprio perfil requer autenticação.
Route::get('/profile',[UserController::class,'profile']) ->middleware('auth');

