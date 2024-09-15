<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\UserController;

// Rota para a página inicial (lista de livros acessível para todos)
Route::get('/', [BookController::class, 'index'])->name('home');

// Rotas para Books (visíveis para todos)
Route::resource('books', BookController::class);

// Rotas para Authors
Route::resource('authors', AuthorController::class);

// Rotas para Categories
Route::resource('categories', CategoryController::class);

// Rotas para Publishers
Route::resource('publishers', PublisherController::class);

// Rotas de autenticação
Auth::routes();

// Rotas para exibir a lista de usuários e permitir a edição dos papéis (acessível apenas para admin)
Route::middleware('auth')->group(function () {
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::post('users/{user}/update-role', [UserController::class, 'updateRole'])->name('users.updateRole');
});

