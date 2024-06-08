<?php

namespace App\Jobs;

use App\Mail\User\Password;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendRestorePasswordToUserJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;
    public $password;
    /**
     * Create a new job instance.
     */
    public function __construct($data, $password) {
        $this->data = $data;
        $this->password = $password;
    }

    /**
     * Execute the job.
     */
    public function handle(): void {
        $email = $this->data['email'];
        $password = $this->password;
        Mail::to($email)->send(new Password($password));
    }
}
