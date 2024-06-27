<?php

namespace App\Jobs;

use App\Mail\User\CreateRoom;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendRoomNotificationToUserJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */

    protected $room, $email;

    public function __construct($room, $email) {
        $this->room = $room;
        $this->email = $email;
    }

    /**
     * Execute the job.
     */
    public function handle(): void {
        $url = $this->room->url;
        $email = $this->email;

        Mail::to($email)->send(new CreateRoom($url, $email));
    }
}
