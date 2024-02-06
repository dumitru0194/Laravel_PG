<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/post/{post}', [App\Http\Controllers\PostController::class, 'show'])->name('post');


Route::middleware('auth')->group(function () {
 
        Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');

        Route::put('/admin/users/{user}/update',  [App\Http\Controllers\UserController::class, 'update'])->name('user.profile.update');

        Route::delete('/admin/users/{user}/destroy',  [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');

});



