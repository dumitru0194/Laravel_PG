<?php

Route::get('/Permission' , [App\Http\Controllers\PermissionController::class, 'index'])->name('permissions.index');