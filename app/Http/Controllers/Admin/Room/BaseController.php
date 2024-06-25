<?php

namespace App\Http\Controllers\Admin\Room;

use App\Http\Services\RoomService;

class BaseController  {

    protected $service;

    public function __construct(RoomService $service) {
        $this->service = $service;
    }

}
