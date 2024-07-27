<?php

namespace App\Http\Controllers\Admin\Order;

use App\Models\Order;

class PayController extends BaseController {


    public function __invoke(Order $order) {
        $path = $this->service->pay($order);

        return $path;
    }


}
