<?php

namespace App\Http\Controllers\V1;

use App\Http\Requests\User\SetImageRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends BaseController {

    public function setImage(SetImageRequest $request) {

    $data = $request->validated();

    $user = Auth::user();

    $this->service->UserSetImage($data, $user);

    return redirect()->back();
    }

}
