<?php

use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->get('/home', [HomeController::class, 'index'])->name('home');
Route::middleware('auth')->get('/create-post', function () {
    return view('posts.create');
})->name('posts.create');

Route::middleware('auth')->post('/create-post', [PostController::class, 'store'])->name('create-post');
Route::middleware('auth')->post('/post/{post}/comment', [PostController::class, 'comment'])->name('post.comment');
Route::middleware('auth')->post('/post/{post}/like', [PostController::class, 'like'])->name('post.like');

// Ruta para la búsqueda de usuarios
Route::middleware('auth')->get('/search', [UserController::class, 'searchForm'])->name('search.form');
Route::middleware('auth')->post('/search', [UserController::class, 'search'])->name('search');

// Ruta para ver un perfil de usuario
Route::middleware('auth')->get('/user/{id}', [UserController::class, 'show'])->name('user.show');
Route::middleware('auth')->get('/perfil/{id}', [UserController::class, 'perfil'])->name('perfil.usuario');

// Ruta para seguir y dejar de seguir
// Rutas para seguir y dejar de seguir
Route::middleware('auth')->post('/follow/{id}', [UserController::class, 'follow'])->name('user.follow');
Route::middleware('auth')->delete('/unfollow/{id}', [UserController::class, 'unfollow'])->name('user.unfollow');


Route::middleware('auth')->get('/user/{id}', [UserController::class, 'show'])->name('user.show');

Route::middleware('auth')->get('/messages/{user}', [MessageController::class, 'index'])->name('messages.chat');
Route::middleware('auth')->post('/messages/{user}', [MessageController::class, 'store'])->name('messages.send');

Route::middleware('auth')->get('/mensajes', [MessageController::class, 'index'])->name('messages.index');
Route::middleware('auth')->get('/mensajes/{id}', [MessageController::class, 'chat'])->name('messages.chat');
Route::middleware('auth')->post('/messages/send', [MessageController::class, 'store'])->name('messages.send');
Route::get('/state/{id}', [StateController::class, 'show'])->name('state.show');
Route::post('/user/update-profile-picture', [UserController::class, 'updateProfilePicture'])->name('user.updateProfilePicture');

//Ruta para recuperar contraseña
Route::get('/password/reset', [PasswordResetController::class, 'showRequestForm'])->name('password.request');
Route::post('/password/email', [PasswordResetController::class, 'sendResetLink'])->name('password.email');

//Ruta para dar el token para recuperar
Route::get('/password/reset/{token}', [PasswordResetController::class, 'showResetForm'])->name('password.reset');
Route::post('/password/reset', [PasswordResetController::class, 'reset'])->name('password.update');
