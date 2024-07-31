<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Room extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'rooms';
    protected $fillable = ['owner_room', 'status', 'name', 'description', 'url'];

    const CLOSE = 0;
    const OPEN = 1;

    protected $user;


    public function ownerName() {
        return $this->belongsTo(User::class, 'owner_room', 'id');
    }


    public function getRoomStatus() {
        return [
          self::CLOSE => 'Закрытая',
          self::OPEN => 'Открытая'
        ];
    }

    public function getRoomStatusAttribute() {
        return $this->getRoomStatus()[$this->status];
    }

}
