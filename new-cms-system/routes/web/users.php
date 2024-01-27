<?php

use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {
 
 Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');

 Route::put('/users/{user}/update',  [App\Http\Controllers\UserController::class, 'update'])->name('user.profile.update');

 Route::delete('/users/{user}/destroy',  [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');

});



Route::middleware('role:admiN')->group(function(){

    Route::get('/users',  [App\Http\Controllers\UserController::class, 'index'])->name('users.index');

});

Route::middleware(['auth', 'can:view,user'])->group(function(){

    Route::get('/users/{user}/profile',  [App\Http\Controllers\UserController::class, 'show'])->name('user.profile.show');

});