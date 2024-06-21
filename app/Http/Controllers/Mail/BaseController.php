<?php

namespace App\Http\Controllers\Mail;

use App\Http\Services\MailService;

class BaseController {

    protected $service;

    public function __construct(MailService $service) {
        $this->service = $service;
    }

}
