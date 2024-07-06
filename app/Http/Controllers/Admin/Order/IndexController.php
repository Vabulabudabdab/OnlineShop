<?php

namespace App\Http\Controllers\Admin\Order;

use App\Models\Order;

class IndexController {

    public function __invoke() {

        $orders = Order::paginate(9);

        return view('admin.order.index', compact('orders'));
    }

}
