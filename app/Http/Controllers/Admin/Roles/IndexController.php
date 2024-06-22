<?php

namespace App\Http\Controllers\Admin\Roles;

use App\Models\Role;

class IndexController {

    public function __invoke() {
        $roles = Role::all();

        return view('admin.roles.control', compact('roles'));
    }

}
