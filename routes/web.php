<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\DepositoController;

// 1. Rota de Início (Home)
Route::get('/', function () {
    return view('index');
})->name('inicio');

// 2. Rotas Informativas
Route::get('/pontos', function () {
    $pontos = \App\Models\PontoColeta::all();
    return view('pontos', compact('pontos'));
})->name('pontos');

Route::get('/educacao', function () {
    return view('educacao');
})->name('educacao');

// 3. Rotas de Contato (Para ver a página e para enviar o formulário)
Route::get('/contato', function () {
    return view('contato');
})->name('contato.index');

Route::post('/contato', [ContatoController::class, 'store'])->name('contato.store');

// Dashboard (mantido, mas não é mais o destino pós-login)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// 4. Rotas Protegidas (Só acessíveis após login)
Route::middleware(['auth'])->group(function () {
    Route::get('/perfil', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/perfil', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/perfil', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Registrar depósito pelo site (sessão)
    Route::post('/perfil/depositos', [DepositoController::class, 'salvarWeb'])->name('depositos.store');
});

// 5. Rotas de Login/Cadastro (Criadas pelo Laravel Breeze)
require __DIR__.'/auth.php';
