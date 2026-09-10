<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//rota::metodo('onde',[classe,'metodo_classe'])
Route::get('/user/{id}',[UserController::class,'show']);
//rota com middleware
//rota::metodo('onde',[classe,'metodo_classe'])->middleware('auth');
Route::get('/profile',[UserController::class,'show'])->middleware('auth');
