<?php

namespace App\Http\Controllers\Admin\Payment;

use App\Http\Services\PaymentService;

class BaseController {

    protected $service;

    public function __construct(PaymentService $service) {
        $this->service = $service;
    }

}
