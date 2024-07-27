<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Requests\Order\StoreRequest;
use App\Models\Product;

class StoreController extends BaseController {

    public function __invoke(Product $product) {

        $path = $this->service->createOrder($product);

        return $path;
    }

}
