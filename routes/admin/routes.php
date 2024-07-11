<?php

use Illuminate\Support\Facades\Route;

Route::group([], function () {

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
        Route::delete('/delete/{room}', \App\Http\Controllers\Admin\Room\DeleteController::class)->name('admin.rooms.delete');

    });

    Route::group(['prefix' => 'categories'], function () {

        /**
         * Get Routes
         */

        Route::get('/', \App\Http\Controllers\Admin\Category\IndexController::class)->name('admin.categories.index');
        Route::get('/create', \App\Http\Controllers\Admin\Category\CreateController::class)->name('admin.categories.create');
        Route::get('/show/{category}', \App\Http\Controllers\Admin\Category\ShowController::class)->name('admin.categories.show');
        Route::get('/edit/{category}', \App\Http\Controllers\Admin\Category\EditController::class)->name('admin.categories.edit');

        /**
         * Post Routes
         */
        Route::post('/create/store', \App\Http\Controllers\Admin\Category\StoreController::class)->name('admin.categories.store.post');
        Route::patch('/edit/store/{category}', \App\Http\Controllers\Admin\Category\UpdateController::class)->name('admin.categories.update');
        Route::post('/delete/{category}', \App\Http\Controllers\Admin\Category\DeleteController::class)->name('admin.categories.delete');
    });

    Route::group(['prefix' => 'tags'], function () {

        /**
         * Get Routes
         */

        Route::get('/', \App\Http\Controllers\Admin\Tag\IndexController::class)->name('admin.tags.index');
        Route::get('/create', \App\Http\Controllers\Admin\Tag\CreateController::class)->name('admin.tags.create');
        Route::get('/show/{tag}', \App\Http\Controllers\Admin\Tag\ShowController::class)->name('admin.tags.show');
        Route::get('/edit/{tag}', \App\Http\Controllers\Admin\Tag\EditController::class)->name('admin.tags.edit');

        /**
         * Patch/Post/Delete Routes
         */

        Route::post('/create/store', \App\Http\Controllers\Admin\Tag\StoreController::class)->name('admin.tags.store');
        Route::patch('/edit/store/{tag}', \App\Http\Controllers\Admin\Tag\UpdateController::class)->name('admin.tags.update');
        Route::delete('/delete/{tag}', \App\Http\Controllers\Admin\Tag\DeleteController::class)->name('admin.tags.delete');
    });

    Route::group(['prefix' => 'product'], function () {

        /**
         * Get Routes
         */

        Route::get('/', \App\Http\Controllers\Admin\Product\IndexController::class)->name('admin.products.index');
        Route::get('/create', \App\Http\Controllers\Admin\Product\CreateController::class)->name('admin.products.create');
        Route::get('/show/{product}', \App\Http\Controllers\Admin\Product\ShowController::class)->name('admin.products.show');
        Route::get('/edit/{product}', \App\Http\Controllers\Admin\Product\EditController::class)->name('admin.products.edit');

        /**
         * Patch/Post/Delete Routes
         */

        Route::post('/create/store', \App\Http\Controllers\Admin\Product\StoreController::class)->name('admin.products.store');
        Route::patch('/update/{product}', \App\Http\Controllers\Admin\Product\UpdateController::class)->name('admin.products.update');
        Route::delete('/delete/{product}', \App\Http\Controllers\Admin\Product\DeleteController::class)->name('admin.products.delete');

    });

    Route::group(['prefix' => 'orders'], function () {

        /**
         * Get Routes
         */

        Route::get('/', \App\Http\Controllers\Admin\Order\IndexController::class)->name('admin.orders.index');

    });

    Route::group(['prefix' => 'payment'], function () {

        /**
         * Get Routes
         */

        Route::get('/', \App\Http\Controllers\Admin\Payment\PaymentController::class)->name('admin.payment.index');

        /**
         * Patch/Post/Delete Routes
         */

        Route::post('/store', \App\Http\Controllers\Admin\Payment\StoreController::class)->name('admin.payment.store');

    });


});
