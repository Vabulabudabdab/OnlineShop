<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'owner', 'auth', 'verify'],function () {

    Route::get('/home', App\Http\Controllers\Admin\AdminIndexController::class)->name('admin.index.page');

    Route::group(['prefix' => 'users'], function () {

        /**
         Get Query
         */

        Route::get('/', \App\Http\Controllers\Admin\Users\IndexController::class)->name('admin.users.index');
        Route::get('/show/{user}', \App\Http\Controllers\Admin\Users\ShowController::class)->name('admin.users.show');
        Route::get('/edit/{user}', \App\Http\Controllers\Admin\Users\EditController::class)->name('admin.users.edit');

        /**
         Post/Patch/Delete Query
         */

        Route::post('/search', \App\Http\Controllers\Admin\Users\SearchController::class)->name('admin.users.search');
        Route::post('/edit/{user}/update', \App\Http\Controllers\Admin\Users\UpdateController::class)->name('admin.users.update');

        Route::delete('/delete/{user}', \App\Http\Controllers\Admin\Users\DeleteController::class)->name('admin.users.delete');

    });



});
