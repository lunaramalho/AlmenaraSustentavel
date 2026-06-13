<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DepositoController;

// Rotas de autenticação (não precisam de token)
Route::post('/login', [AuthController::class, 'login']);
Route::post('/cadastrar', [AuthController::class, 'cadastrar']);

// Rotas protegidas (precisam do token)
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/depositos', [DepositoController::class, 'index']);
    Route::post('/depositos', [DepositoController::class, 'store']);
    Route::post('/contato', [ContatoController::class, 'store']);
    Route::post('/contato', [App\Http\Controllers\ContatoController::class, 'store']);
});