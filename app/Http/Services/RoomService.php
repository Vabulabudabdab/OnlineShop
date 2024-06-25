<?php

namespace App\Http\Services;

use App\DataTransferObject\CreateRoomDTO;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class RoomService {

    /**
     * GET ALL ROOMS parameter: none
     */
    public function getRooms() {
        $rooms = Room::paginate(9);

        return $rooms;
    }

    public function store(CreateRoomDTO $dto) {
        $url = $dto->name;
        $url = Crypt::encrypt($url);

        $owner = Auth::user()->id;

        try {
            DB::beginTransaction();

            Room::FirstOrCreate([
                'owner_room' => $owner,
                'status' => $dto->status,
                'name' => $dto->name,
                'description' => $dto->description,
                'url' => $url
            ]);

            DB::commit();
        } catch (\Exception $exception) {
            abort(500);
            DB::rollback();
        }

        $room = Room::all('url')->where('url', $url)->first();

        return $room;
    }

    public function getCurrentRoomInfo($url) {
        $room = Room::where('url', $url)->first();

        return $room;
    }

    public function getClearUrl($data) {

        foreach ($data as $url) {
            return $url;
        }

    }

}
