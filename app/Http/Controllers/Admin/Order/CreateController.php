<?php

namespace App\Http\Controllers\Admin\Order;

use App\Models\Product;

class CreateController {

    public function __invoke() {

        $products = Product::paginate(9);

        return view('admin.order.create', compact('products'));
    }

}
