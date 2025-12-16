<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController; // Vamos criar este controller já já

// Rotas de Login (Públicas)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.auth');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Grupo de Rotas Protegidas (Precisa estar logado)
Route::middleware('auth')->group(function () {
    
    Route::get('/', function () {
        return redirect('/products');
    });

    Route::resource('products', ProductController::class);
});