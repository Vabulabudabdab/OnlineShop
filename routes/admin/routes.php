<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'owner', 'auth', 'verify'],function () {

    Route::get('/home', [App\Http\Controllers\Admin\AdminIndexController::class, 'home'])->name('admin.index.page');

    Route::group(['prefix' => 'users'], function () {

        Route::get('/', [\App\Http\Controllers\Admin\AdminIndexController::class, 'users'])->name('admin.users.index.page');
        Route::get('/show/{id}', [\App\Http\Controllers\Admin\AdminIndexController::class, 'user_show'])->name('admin.users.show.page');

    });



});
