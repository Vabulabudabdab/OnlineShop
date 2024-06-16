<?php

namespace App\Http\Controllers\Admin\Users;

use App\Models\User;

class ShowController {

    public function __invoke(User $user) {

        return view('admin.users.show', compact('user'));
    }

}
