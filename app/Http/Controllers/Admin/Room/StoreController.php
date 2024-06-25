<?php

namespace App\Http\Controllers\Admin\Room;

use App\DataTransferObject\CreateRoomDTO;
use App\Http\Requests\Room\CreateRequest;
use Illuminate\Support\Facades\Route;

class StoreController extends BaseController {

    public function __invoke(CreateRequest $request) {

        $data = $request->validated();

        $url = $this->service->store(new CreateRoomDTO($data['name'], $data['description'], $data['status']));
        $clearUrl = $url->url;
        return redirect()->route('admin.rooms.show', $clearUrl)
        ->with('success_create_room', "Комната {$data['name']} успешно создана");
    }

}
