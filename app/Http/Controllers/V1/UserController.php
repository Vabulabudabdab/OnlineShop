<?php

namespace App\Http\Controllers\V1;

use App\Http\Requests\User\SetImageRequest;

class UserController extends BaseController {

    public function setImage(SetImageRequest $request) {

    $data = $request->validated();

    dd($data);

    $this->service->setImage($data);

    }

}
