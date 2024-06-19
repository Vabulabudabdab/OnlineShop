<?php

namespace App\Http\Controllers\Admin\Users;

use App\DataTransferObject\CreateUserDTO;
use App\Http\Requests\User\CreateUserRequest;

class StoreController extends BaseController {

    public function __invoke(CreateUserRequest $request) {

        $data = $request->validated();

        $image = $this->service->image($data['image']);
        $password = $this->service->getUnHashedPassword();
        $path = $this->service->store(new CreateUserDTO($data['email'], $data['name'], $data['role_id'], $password, $image));

        return $path;
    }

}
