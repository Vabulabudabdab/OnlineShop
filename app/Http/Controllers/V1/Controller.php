<?php

namespace App\Http\Controllers\V1;

use App\Models\Currency;
use App\Models\Language;
use App\Models\Product;
use App\Models\User;


class Controller {

    public function home() {
        $products = Product::all();
        $currencies = Currency::all();
        $languages = Language::all();
        return view('home.home', compact('products', 'currencies', 'languages'));
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
        $currencies = Currency::all();
        $languages = Language::all();
        $username = request()->route()->parameter('name');
        $user = User::all()->where('name', $username)->first();

        return view('user.profile', compact('user','currencies', 'languages'));
    }

}
