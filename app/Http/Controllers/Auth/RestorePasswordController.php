<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\RestorePasswordRequest;
use Illuminate\Support\Facades\Auth;

class RestorePasswordController extends BaseController {

    public function __invoke(RestorePasswordRequest $request) {

        $data = $request->validated();

        $this->service->password_restore($data);

        return redirect()->route('login.get');
    }

}
