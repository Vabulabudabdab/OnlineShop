<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\V1\Controller::class, 'home'])->name('home');
Route::get('/logout', \App\Http\Controllers\Auth\LogoutController::class)->name('logout');



Route::group(['prefix' => 'home'],  function () {

    Route::get('/', [App\Http\Controllers\V1\Controller::class, 'home'])->name('home');

    Route::post('/currency/{user}', [App\Http\Controllers\V1\UserController::class, 'changeCurrency'])->name('home.change.currency');
    Route::post('/lang/{user}', [App\Http\Controllers\V1\UserController::class, 'changeLang'])->name('home.change.lang');


    Route::group(['prefix' => 'profile'], function () {
       Route::get('/{name}', [\App\Http\Controllers\V1\Controller::class, 'profile'])->name('profile')->middleware('auth');
       Route::post('/qr', [\App\Http\Controllers\V1\UserController::class, 'generateQr'])->name('home.qr.gen');
       Route::post('/{id}/setImage', [\App\Http\Controllers\V1\UserController::class, 'setImage'])->name('profile.set-image');

    });

});

Route::group(['prefix' => 'auth'],  function () {

    Route::get('/register', [App\Http\Controllers\V1\Controller::class, 'register'])->name('register.get');

    Route::post('/register/user', \App\Http\Controllers\Auth\RegisterController::class)->name('register.post');

    Route::get('/login', [App\Http\Controllers\V1\Controller::class, 'login'])->name('login.get');

    Route::post('/login/user', \App\Http\Controllers\Auth\LoginController::class)->name('login.post');

    Route::get('/restore', [App\Http\Controllers\V1\Controller::class, 'restore_password'])->name('password.restore');

    Route::post('/restore', \App\Http\Controllers\Auth\RestorePasswordController::class)->name('password.restore.submit');

});
