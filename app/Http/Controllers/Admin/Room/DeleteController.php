<?php

namespace App\Http\Controllers\Admin\Room;

use App\Models\Room;

class DeleteController extends BaseController {

    public function __invoke(Room $room) {

        $this->service->delete($room);

        return redirect()->route('admin.rooms.index')->with('success_delete_room', "Комната успешно удалена");
    }

}
