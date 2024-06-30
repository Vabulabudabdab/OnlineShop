<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Services\TagService;

class BaseController {

    protected $service;
    public function __construct(TagService $service) {
        $this->service = $service;
    }

}
