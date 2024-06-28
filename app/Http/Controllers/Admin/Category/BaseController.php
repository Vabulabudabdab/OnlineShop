<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Services\CategoryService;

class BaseController {

    protected $service;

    public function __construct(CategoryService $service) {
        $this->service = $service;
    }

}
