<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Auth\BaseController;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Services\AuthService;

class RegisterController extends BaseController {

    public function __invoke(RegisterRequest $request) {

        $data = $request->validated();

        $this->service->register($data);

        return redirect('/home');
    }
}
