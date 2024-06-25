<?php

namespace App\Http\Controllers\Admin\Room;

class IndexController extends BaseController {

    public function __invoke() {

        $rooms = $this->service->getRooms();

        return view('admin.room.index', compact('rooms'));
    }

}
