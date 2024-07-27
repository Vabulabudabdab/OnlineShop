<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Order extends Model {

    use HasFactory, Notifiable;

    protected $table = 'orders';

    protected $fillable = ['product', 'user', 'status'];

    public function products() {
        return $this->belongsTo(Product::class, 'product', 'id');
    }

    public function users() {
        return $this->belongsTo(User::class, 'user', 'id');
    }

    public function payments() {
        return $this->belongsTo(Payment::class, 'status', 'id');
    }

    public function current_status() {
        return $this->belongsTo(Status::class, 'status', 'id');
    }

}
