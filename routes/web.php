<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ComentarioController;

Route::get('/', [LoginController::class,'index']);

Route::get('/register', [RegisterController::class,'index'])->name('register');
Route::post('/register', [RegisterController::class,'store'])->name('register');

Route::get('/login', [LoginController::class,'index'])->name('login');
Route::post('/login', [LoginController::class,'store'])->name('login');

Route::post('/logout', [LogoutController::class,'store'])->name('logout');

Route::get('/{user:username}', [PostController::class, 'index'])->name('posts.index')->middleware('auth');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create')->middleware('auth');

Route::post('/imagenes', [ImagesController::class,'store'])->name('imagenes.store');

Route::post('/posts', [PostController::class,'store'])->name('posts.store');
Route::get('/{user:username}/posts/{post}', [PostController::class,'show'])->name('posts.show');
Route::delete('/posts/{post}',[PostController::class,'destroy'])->name('posts.destroy');

Route::post('/posts/{post}/comentarios', [ComentarioController::class,'store'])->name('comentarios.store'); // Cambié la ruta para los comentarios
