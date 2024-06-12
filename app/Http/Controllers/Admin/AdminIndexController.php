<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminIndexController {

    public function home() {

        $users = User::all()->count();

        return view('admin.index', compact('users'));
    }

    public function users() {

        $users = User::paginate(9);

        return view('admin.users.index', compact('users'));
    }

    public function user_show(User $user) {

        return view('admin.users.show', compact('user'));
    }

    public function category() {

    }

    public function tags() {

    }

    public function products() {

    }

    public function orders() {

    }

    public function posts() {

    }

    public function banned() {

    }

}
