<?php

namespace App\Http\Controllers\V1;

use App\Http\Requests\CurrencyRequest;
use App\Http\Requests\LanguageRequest;
use App\Http\Requests\User\SetImageRequest;
use App\Models\User;

class UserController extends BaseController {

    public function setImage(SetImageRequest $request) {

    $data = $request->validated();

    $this->service->UserSetImage($data);

    return redirect()->back();
    }

    public function changeCurrency(CurrencyRequest $request, User $user) {
        $data = $request->validated();

        $this->service->changeCurrency($data, $user);

        return redirect()->back();
    }

    public function changeLang(LanguageRequest $request, User $user) {
        $data = $request->validated();

        $this->service->changeLanguage($data, $user);

        return redirect()->back();
    }

}
