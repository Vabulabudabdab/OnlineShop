<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Session;

class LoginController extends BaseController {

    public function __invoke(LoginRequest $request) {

        $data = $request->validated();

        $path = $this->service->login($request);

        return $path;
    }
}
