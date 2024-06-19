<?php

namespace App\Jobs;

use App\Mail\User\Password;
use Illuminate\Auth\Events\Registered;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendPasswordToUserJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */

    protected $email, $password, $user;

    public function __construct($email, $password, $user) {
        $this->email = $email;
        $this->password = $password;
        $this->user = $user;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $email = $this->email;
        $password = $this->password;
        $user = $this->user;

        Mail::to($email)->send(new Password($password));
        event(new Registered($user));
    }
}
