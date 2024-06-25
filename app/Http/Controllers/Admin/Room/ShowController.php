<?php

namespace App\Http\Controllers\Admin\Room;

use App\Models\Room;

class ShowController extends BaseController {

    public function __invoke($url) {
        $room = $this->service->getCurrentRoomInfo($url);

        return view('admin.room.show', compact('room'));
    }

}
