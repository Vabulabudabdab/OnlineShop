<?php

namespace App\Http\Controllers\Admin\Users;

use App\Models\User;

class UnBanController extends BaseController {

    public function __invoke(User $user) {

        $this->service->unBan($user);

        return redirect()->back()->with('success_unban', "Пользователь {$user->email} успешно разблокирован");
    }

}
