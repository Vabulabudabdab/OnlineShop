<?php

namespace App\Http\Controllers\Admin\Users;

use App\Models\User;

class DeleteController extends BaseController {

    public function __invoke(User $user) {
        $this->service->delete($user);

        return redirect()->back()->with('success_delete', 'Пользователь успешно удалён');
    }

}
