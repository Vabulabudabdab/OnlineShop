<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';
    protected $fillable = ['user_id', 'post_id', 'message'];

    public function posts() {
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }

}
