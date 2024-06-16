<?php

namespace App\Http\Controllers\Admin\Users;

use App\Models\User;

class EditController {

    public function __invoke(User $user) {
        return view('admin.users.edit', compact('user'));
    }

}
