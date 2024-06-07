<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\LoginRequest;
class LoginController extends BaseController {

    public function __invoke(LoginRequest $request) {

        $data = $request->validated();

        if(isset($_POST['check']) && empty($this->service->getLoginCookie())) {
            $_POST['check'] = true;
            $this->service->setLoginCookie($data);
        }

        $this->service->login($data);

        return redirect()->back();
    }

}
