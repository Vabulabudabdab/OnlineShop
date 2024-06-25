<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'owner', 'auth', 'verify'],function () {

    Route::get('/home', App\Http\Controllers\Admin\AdminIndexController::class)->name('admin.index.page');

    Route::group(['prefix' => 'users'], function () {

        /**
         Get Routes
         */

        Route::get('/', \App\Http\Controllers\Admin\Users\IndexController::class)->name('admin.users.index');
        Route::get('/create', \App\Http\Controllers\Admin\Users\CreateController::class)->name('admin.users.create');
        Route::get('/show/{user}', \App\Http\Controllers\Admin\Users\ShowController::class)->name('admin.users.show');
        Route::get('/edit/{user}', \App\Http\Controllers\Admin\Users\EditController::class)->name('admin.users.edit');
        Route::get('/banned', \App\Http\Controllers\Admin\Users\BannedController::class)->name('admin.users.banned');


        /**
         Post/Patch/Delete Routes
         */

        Route::post('/search', \App\Http\Controllers\Admin\Users\SearchController::class)->name('admin.users.search');
        Route::post('/create/store', \App\Http\Controllers\Admin\Users\StoreController::class)->name('admin.users.create.store');
        Route::post('/edit/{user}/update', \App\Http\Controllers\Admin\Users\UpdateController::class)->name('admin.users.update');
        Route::post('/ban/{user}/block', \App\Http\Controllers\Admin\Users\BannedPostController::class)->name('admin.users.banned.post');
        Route::post('/ban/{user}/unban', \App\Http\Controllers\Admin\Users\UnBanController::class)->name('admin.users.unban');


        Route::delete('/delete/{user}', \App\Http\Controllers\Admin\Users\DeleteController::class)->name('admin.users.delete');

    });

    Route::group(['prefix' => 'roles'], function () {

        /**
         * Get Routes
         */
       Route::get('/', \App\Http\Controllers\Admin\Roles\IndexController::class)->name('admin.roles.index');

       /**
        * Post Routes
        */
    });

    Route::group(['prefix' => 'rooms'], function () {

        /**
         * Get Routes
         */

        Route::get('/', \App\Http\Controllers\Admin\Room\IndexController::class)->name('admin.rooms.index');
        Route::get('/create', \App\Http\Controllers\Admin\Room\CreateController::class)->name('admin.rooms.create');
        Route::get('/{url}', \App\Http\Controllers\Admin\Room\ShowController::class)->name('admin.rooms.show');

        /**
         * Post Routes
         */

        Route::post('/create/store', \App\Http\Controllers\Admin\Room\StoreController::class)->name('admin.rooms.store');

    });

});
