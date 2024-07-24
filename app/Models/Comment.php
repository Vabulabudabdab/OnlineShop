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

    public function users() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function subComments() {
        return $this->hasMany(SubComment::class, 'comment_id', 'id');
    }

}
