<?php

namespace App\Http\Controllers\Admin\Users;

class BannedController extends BaseController {

    public function __invoke() {

        $users = $this->service->showBanned();

        return view('admin.users.banned', compact('users'));
    }

}
