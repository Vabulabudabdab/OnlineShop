<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminIndexController {

    public function __invoke() {

        $users = User::all()->count();

        return view('admin.index', compact('users'));
    }


}
