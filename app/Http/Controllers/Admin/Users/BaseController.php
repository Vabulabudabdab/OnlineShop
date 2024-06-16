<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Services\UserService;

class BaseController {

    protected $service;

    public function __construct(UserService $service) {
        $this->service = $service;
    }

}
