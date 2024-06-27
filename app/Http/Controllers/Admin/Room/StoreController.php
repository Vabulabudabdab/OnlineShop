<?php

namespace App\Http\Controllers\Admin\Room;

use App\DataTransferObject\CreateRoomDTO;
use App\Http\Requests\Room\CreateRequest;

class StoreController extends BaseController {

    public function __invoke(CreateRequest $request) {

        $data = $request->validated();

        $url = $this->service->store(new CreateRoomDTO($data['name'], $data['description'], $data['status']));

        return redirect()->route('admin.rooms.show', $url)
        ->with('success_create_room', "Комната {$data['name']} успешно создана");
    }

}
