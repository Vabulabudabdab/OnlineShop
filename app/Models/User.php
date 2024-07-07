<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\SendVerifyWithQueueNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;


class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $table = 'users';
    protected $fillable = ['name', 'email', 'password', 'image', 'role_id', 'remember_token', 'banned_at', 'balance'];

    protected $dates = [
        'banned_at'
    ];

    const OWNER = 1;
    const ADMIN = 2;
    const MODERATOR = 3;
    const USER = 4;

    public function getRoleName() {
        return [
            self::USER => 'Пользователь',
            self::ADMIN => 'Администратор',
            self::MODERATOR => 'Модератор',
            self::OWNER => 'Создатель',
        ];
    }

    public function getRoleTitleAttribute() {
        return $this->getRoleName()[$this->role_id];
    }



    public function sendEmailVerificationNotification() {
        $this->notify(new SendVerifyWithQueueNotification());
    }

    public function role_id() {
        return $this->hasOne(Role::class, 'role_id', 'id');
    }

    public function ban(User $user,$ban_date) {

        try {
            DB::beginTransaction();

            $user->update([
                'banned_at' => $ban_date
            ]);

            DB::commit();
        } catch (\Exception $exception) {
            abort(500);
            DB::rollBack();
        }
    }




}

