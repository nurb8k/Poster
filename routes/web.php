<?php

use App\Http\Controllers\Auth2\RegisterController;
use App\Http\Controllers\Auth2\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Adm\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('posts.index');
});

Route::middleware('auth')->group(function () {
    Route::resource('/posts', PostController::class)->except('index', 'show');
    // only() <- only this routes
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/posts/category/{category}', [PostController::class, 'postsByCategory'])->name('posts.category');
    Route::post('/posts/create/', [CommentController::class, 'createComment'])->name('comments.create');
    Route::delete('/posts/delete/{comment}', [CommentController::class, 'destroyComment'])->name('comments.delete');
    Route::get('/posts/edit/{comment}', [CommentController::class, 'editComment'])->name('comments.edit');
    Route::put('/posts/edit/success/{comment}', [CommentController::class, 'updateComment'])->name('comments.update');

    Route::prefix('adm')->as('adm.')->middleware('hasrole:admin')->group(function () {
        Route::get('/users/', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/search', [UserController::class, 'index'])->name('users.search');
        Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
        Route::put('/users/{user}/ban', [UserController::class, 'ban'])->name('users.ban');
        Route::put('/users/{user}/unban', [UserController::class, 'unban'])->name('users.unban');

        //        Route::get('/adm/posts/',[UserController::class ,'showPosts'])->name('adm.posts');

    });
});
Route::resource('posts', PostController::class)->only('index', 'show');


Route::get('/register', [RegisterController::class, 'create'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/login', [LoginController::class, 'create'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
