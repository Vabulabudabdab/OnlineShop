<?php

namespace App\Jobs;

use App\Mail\User\PaymentStatus;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendPaymentNotificationToUserJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $order, $email;

    /**
     * Create a new job instance.
     */
    public function __construct($order, $email)
    {
        $this->order = $order;
        $this->email = $email;
    }

    /**
     * Execute the job.
     */
    public function handle(): void {
        $order = $this->order;
        $email = $this->email;

        Mail::to($email)->send(new PaymentStatus($order, $email));
    }
}
