<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\PostagemController;
use App\Http\Controllers\ContaPostagemController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegistrarController;

/* Home */
Route::get('/', [ContaPostagemController::class, 'listaPostagem'])->name('home');

/* Logar (in/out) */
Route::post('/logout', [LogoutController::class, 'store'])->name('logout'); // Faz o Logout (não precisa de página pois está no cabeçalho)

Route::get('/login', [LoginController::class, 'index'])->name('login'); // Página de fazer login
Route::post('/login', [LoginController::class, 'store']); // Faz o login

/* Registrar */
Route::get('/register', [RegistrarController::class, 'index'])->name('register'); // Página de criar conta
Route::post('/register', [RegistrarController::class, 'store']); // Salva conta

/* Postagens */
Route::get('/criarpostagem', [PostagemController::class, 'index'])->name('criarpostagem'); // Página de criar postagem
Route::get('/criarpostagem/{post}', [PostagemController::class, 'show'])->name('criarpostagem.show'); // Mostra postagem
Route::post('/criarpostagem', [PostagemController::class, 'store']); // Salva postagem
Route::delete('/criarpostagem/{post}', [PostagemController::class, 'destroy'])->name('criarpostagem.destroy'); // Deleta postagem

/* Comentarios */
Route::get('/criarcomentario', [ComentarioController::class, 'index'])->name('criarcomentario'); // Página de criar postagem
Route::post('/criarcomentario', [ComentarioController::class, 'store']); // Salva comentário
Route::delete('/criarcomentario/{comentario}', [ComentarioController::class, 'destroy'])->name('criarcomentario.destroy'); // Deleta comentário

Route::get('/users/{conta:name}/posts', [ContaPostagemController::class, 'index'])->name('contas.postagens'); // Mostra todas as postagens de um usuário
//Route::get('/users/{conta:name}/posts', [ComentarioController::class, 'index'])->name('contas.comentario'); // Mostra todas as postagens de um usuário
