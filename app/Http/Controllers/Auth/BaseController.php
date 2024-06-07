<?php

namespace App\Http\Controllers\Auth;

use App\Http\Services\AuthService;

class BaseController {

    public $service;
    public function __construct(AuthService $service) {
        $this->service = $service;
    }

}
