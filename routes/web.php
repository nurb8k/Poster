<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('posts.index');
});

Route::resource('posts', PostController::class);
Route::get('/posts/category/{category}', [PostController::class, 'postsByCategory'])->name('posts.category');
Route::post('/posts/create/', [PostController::class, 'createComment'])->name('comments.create');
Route::delete('/posts/delete/{comment}', [PostController::class, 'destroyComment'])->name('comments.delete');
Route::get('/posts/edit/{comment}', [PostController::class, 'editComment'])->name('comments.edit');
Route::put('/posts/edit/success/{comment}', [PostController::class, 'updateComment'])->name('comments.update');

//Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
//Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
//Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
//Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
