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
    protected $fillable = ['name', 'email', 'password', 'image', 'role_id', 'remember_token'];

//   const OWNER = 1;
//   const ADMIN = 2;
//   const MODERATOR = 3;
//   const USER = 4;
//
//    public function getRoleId() {
//        return [
//          self::OWNER => 'Создатель',
//          self::ADMIN => 'Администратор',
//          self::MODERATOR => 'Модератор',
//          self::USER => 'Пользователь',
//        ];
//   }
//
//    public function getRoleTitleAttribute() {
//        return self::getRoleId()[$this->role_id];
//   }

    public function sendEmailVerificationNotification() {
        $this->notify(new SendVerifyWithQueueNotification());
    }

    public function role() {
        return $this->hasOne(Role::class, 'role_id', 'id');
    }

}

