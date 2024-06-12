<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Session;

class LoginController extends BaseController {

    public function __invoke(LoginRequest $request) {

        $data = $request->validated();

        if($this->service->login($data)) {
            return redirect()->route('home');
        } else {
            return redirect()->route('login.get')->with('error_login', 'Неверный логин или пароль');
        }
    }
}
