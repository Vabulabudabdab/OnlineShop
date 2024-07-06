<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model {
    use HasFactory;
    protected $table = 'orders';

    protected $fillable = ['product', 'user', 'payment_status'];

    public function products() {
        return $this->belongsTo(Product::class, 'product', 'id');
    }

    public function users() {
        return $this->belongsTo(User::class, 'user', 'id');
    }

    public function payments() {
        return $this->belongsTo(Payment::class, 'status', 'id');
    }

}
