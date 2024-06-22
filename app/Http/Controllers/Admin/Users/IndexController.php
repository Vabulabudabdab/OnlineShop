<?php

namespace App\Http\Controllers\Admin\Users;

use App\Models\User;

class IndexController {

    public function __invoke() {

        $users = User::paginate(9, '*', 'user');

        return view('admin.users.index', compact('users'));
    }

}
