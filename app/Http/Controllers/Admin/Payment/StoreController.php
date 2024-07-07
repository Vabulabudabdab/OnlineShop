<?php

namespace App\Http\Controllers\Admin\Payment;

use App\Http\Requests\Payment\PaymentRequest;

class StoreController extends BaseController {

    public function __invoke(PaymentRequest $request) {
        $data = $request->validated();

        $this->service->account_store($data);

        return redirect()->route('admin.payment.index');
    }

}
