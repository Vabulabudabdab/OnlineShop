<?php

namespace App\Http\Controllers\Admin\Room;

class CreateController extends BaseController {

    public function __invoke() {
        return view('admin.room.create');
    }

}
