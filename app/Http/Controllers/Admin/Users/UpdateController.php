<?php

namespace App\Http\Controllers\Admin\Users;

use App\DataTransferObject\UpdateUserDTO;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;

class UpdateController extends BaseController {

    public function __invoke(UpdateRequest $request, User $user) {

        $data = $request->validated();

        $image = $this->service->image($data['image']);

        $this->service->update(new UpdateUserDTO($data['name'], $data['email'], $image, $data['role_id']), $user);

        return redirect()->route('admin.users.show', $user);
    }

}
