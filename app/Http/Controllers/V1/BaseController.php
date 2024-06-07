<?php

namespace App\Http\Controllers\V1;

use App\Http\Services\V1Service;

class BaseController {

    protected $service;

    public function __construct(V1Service $service) {
        $this->service = $service;
    }

}
