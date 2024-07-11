<?php

namespace App\Http\Controllers\Admin\Payment;

use App\Models\User;

class PaymentController {

    public function __invoke() {
        $users = User::all();

        return view('admin.payment.index', compact('users'));
    }

}
