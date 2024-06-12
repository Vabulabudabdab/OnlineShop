<?php

namespace App\Http\Controllers\V1;

use App\Http\Requests\User\SetImageRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends BaseController {

    public function setImage(SetImageRequest $request) {

    $data = $request->validated();

    $this->service->UserSetImage($data);

    return redirect()->back();
    }

}
