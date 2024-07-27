<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Services\OrderService;

class BaseController {

    protected $service;
    public function __construct(OrderService $service) {
        $this->service = $service;
    }

}

