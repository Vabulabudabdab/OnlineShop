<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\SendVerifyWithQueueNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    protected $guarded = false;

    public function sendEmailVerificationNotification() {
        $this->notify(new SendVerifyWithQueueNotification());
    }

    public function role() {
        return $this->hasOne(Role::class, 'role_id', 'id');
    }

}

