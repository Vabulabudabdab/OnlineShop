<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Requests\User\BanUserRequest;
use App\Models\User;

class BannedPostController extends BaseController {

    public function __invoke(BanUserRequest $request, User $user) {

        $data = $request->validated();

        $this->service->ban($data, $user);

        return redirect()->back()->with('success_ban', "Пользователь {$user->email} заблокирован");
    }

}
