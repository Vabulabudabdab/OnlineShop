<?php

namespace App\Http\Controllers\V1;

use App\Http\Requests\CurrencyRequest;
use App\Http\Requests\User\SetImageRequest;

class UserController extends BaseController {

    public function setImage(SetImageRequest $request) {

    $data = $request->validated();

    $this->service->UserSetImage($data);

    return redirect()->back();
    }

    public function changeCurrency(CurrencyRequest $request) {
        dd($_POST['USD']);
        $data = $request->validated();
        dd($data);

    }

}
