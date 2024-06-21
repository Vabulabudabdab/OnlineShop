<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'banned'], function () {

    Route::prefix('/')->group(
        base_path('routes/v1/routes.php'),
    );

    Route::prefix('/home')->group(
        base_path('routes/verify/routes.php')
    );

    Route::prefix('/admin')->group(
        base_path('routes/admin/routes.php')
    )->middleware(['owner', 'auth', 'verify']);


});



Auth::routes(['verify' => true]);
