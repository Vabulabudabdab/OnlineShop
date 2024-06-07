<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::prefix('/')->group(
    base_path('routes/v1/routes.php'),
);

Auth::routes(['verify' => true]);
