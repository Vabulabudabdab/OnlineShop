<?php

namespace App\Http\Controllers\V1;

use App\Models\Product;
use App\Models\User;


class Controller {

    public function home() {
        $products = Product::all();
        return view('home.home', compact('products'));
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

    public function profile(User $user) {

        $username = request()->route()->parameter('name');
        $user = User::all()->where('name', $username)->first();

        return view('user.profile', compact('user'));
    }

}
