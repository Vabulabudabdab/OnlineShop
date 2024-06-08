<?php

use Illuminate\Support\Facades\Route;



Route::group([],  function () {
    Route::get('/home', [App\Http\Controllers\V1\Controller::class, 'home'])->name('home');
    Route::get('/logout', \App\Http\Controllers\Auth\LogoutController::class)->name('logout');
});


Route::group(['prefix' => 'auth'],  function () {

    Route::get('/register', [App\Http\Controllers\V1\Controller::class, 'register'])->name('register.get');

    Route::post('/register/user', \App\Http\Controllers\Auth\RegisterController::class)->name('register.post');

    Route::get('/login', [App\Http\Controllers\V1\Controller::class, 'login'])->name('login.get');

    Route::post('/login/user', \App\Http\Controllers\Auth\LoginController::class)->name('login.post');

    Route::get('/restore', [App\Http\Controllers\V1\Controller::class, 'restore_password'])->name('password.restore');

    Route::post('/restore', \App\Http\Controllers\Auth\RestorePasswordController::class)->name('password.restore.submit');

});
