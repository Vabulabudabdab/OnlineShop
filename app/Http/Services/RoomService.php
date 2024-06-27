<?php

namespace App\Http\Services;

use App\DataTransferObject\CreateRoomDTO;
use App\Jobs\SendRoomNotificationToUserJob;
use App\Mail\User\CreateRoom;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Ramsey\Uuid\Uuid;

class RoomService {

    /**
     * GET ALL ROOMS parameter: none
     */
    public function getRooms() {
        $rooms = Room::paginate(9);

        return $rooms;
    }

    /**
     * @param CreateRoomDTO $dto
     * @return Room|\Closure|null
     */

    public function store(CreateRoomDTO $dto) { //create room function

        $url = (string) Uuid::uuid4();
        $owner = Auth::user()->id;
        $email = Auth::user()->email;

        try {
            DB::beginTransaction();

            $room = Room::Create([
                'owner_room' => $owner,
                'status' => $dto->status,
                'name' => $dto->name,
                'description' => $dto->description,
                'url' => $url
            ]);

            $room_url = $room->url;

//            SendRoomNotificationToUserJob::dispatch($room, $email);

            Mail::to($email)->send(new CreateRoom($room_url, $email));
            DB::commit();
        } catch (\Exception $exception) {
            dd($exception);
            abort(500);

            DB::rollback();
        }

        return $room_url;
    }

    /**
     * @param $url
     * @return mixed
     */

    public function getCurrentRoomInfo($url) {
        $room = Room::where('url', $url)->first();

        return $room;
    }

    /**
     * @param Room $room
     * @return void
     */

    public function delete(Room $room) : void {
        $room->delete();
    }

}
