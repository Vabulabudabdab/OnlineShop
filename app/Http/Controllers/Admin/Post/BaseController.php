<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Services\PostService;

class BaseController {

    protected $service;
    public function __construct(PostService $service) {
        $this->service = $service;
    }
}
