<?php

namespace App\Http\Controllers\V1;

use App\Http\Services\UserService;

class BaseController {

    protected $service;

    public function __construct(UserService $service) {
        $this->service = $service;
    }

}
