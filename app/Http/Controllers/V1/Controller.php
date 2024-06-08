<?php

namespace App\Http\Controllers\V1;

use App\Http\Services\AuthService;

class Controller {

    public function home() {
        return view('home.home');
    }

    public function register() {
        return view('auth.register');
    }

    public function login() {
        return view('auth.login');
    }

    public function restore_password() {
        return view('auth.password-restore');
    }

}
