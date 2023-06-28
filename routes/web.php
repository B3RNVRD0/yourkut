<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostagemController;
use App\Http\Controllers\ComentariosController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CategoriaController;



Route::get('/', function () {
    return view('login');
});



//postagens
Route::get('/postagens', [PostagemController::class, 'index'])->name('postagens.index');
Route::get('/postagens/create', [PostagemController::class, 'create'])->name('postagens.create');
Route::post('/postagens', [PostagemController::class, 'store'])->name('postagens.store');
Route::get('/postagens/{id}/edit', [PostagemController::class, 'edit'])->name('postagens.edit');
Route::put('/postagens/{id}', [PostagemController::class, 'update'])->name('postagens.update');
Route::delete('/postagens/{id}', [PostagemController::class, 'destroy'])->name('postagens.destroy');

//postagem_categoria
Route::get('/postagens/categoria/{categoria}', [PostagemController::class, 'postagensPorCategoria'])->name('postagens.categoria');


// comentários
Route::get('/comentarios/{postagem}', [ComentariosController::class, 'index'])->name('comentarios.index');
Route::get('/postagens/{postagem}/comentarios', [PostagemController::class, 'showComentarios'])->name('postagens.comentarios');
Route::post('/postagens/{postagem}/comentarios', [PostagemController::class, 'storeComentario'])->name('comentarios.store');
Route::get('/comentarios/{comentario}', [ComentarioController::class, 'show'])->name('comentarios.show');
//categorias
Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');
Route::post('/categorias', [CategoriaController::class, 'store'])->name('categorias.store');


//login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');
//register
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');
//logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
