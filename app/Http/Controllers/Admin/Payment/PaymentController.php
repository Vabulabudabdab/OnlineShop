<?php

namespace App\Http\Controllers\Admin\Payment;

class PaymentController {

    public function __invoke() {
        return view('admin.payment.index');
    }

}
