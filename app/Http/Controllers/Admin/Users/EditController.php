<?php

namespace App\Http\Controllers\Admin\Users;

use App\Models\Role;
use App\Models\User;

class EditController {

    public function __invoke(User $user) {
        $roles = Role::all();

        return view('admin.users.edit', compact('user', 'roles'));
    }

}
