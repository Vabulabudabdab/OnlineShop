<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Services\ProductService;

class BaseController {

    protected $service;
    public function __construct(ProductService $service) {
        $this->service = $service;
    }

}
