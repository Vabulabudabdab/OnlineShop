<?php

namespace App\Http\Controllers\Admin\Users;

use App\DataTransferObject\UpdateUserDTO;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;

class UpdateController extends BaseController {

    public function __invoke(UpdateRequest $request, User $user) {

        $data = $request->validated();

        $this->service->update(new UpdateUserDTO($data['email'], $data['image'], $data['role_id']), $user);

        return redirect()->route('admin.users.show', $user);
    }

}
