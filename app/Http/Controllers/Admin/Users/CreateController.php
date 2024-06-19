<?php

namespace App\Http\Controllers\Admin\Users;

use App\Models\Role;

class CreateController {

    public function __invoke() {

        $roles = Role::all();

        return view('admin.users.create', compact('roles'));
    }

}
