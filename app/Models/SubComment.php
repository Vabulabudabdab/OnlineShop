<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubComment extends Model
{
    use HasFactory;

    protected $table = 'sub_comments';

    public function comments() {
        return $this->belongsTo(Comment::class, 'comment_id', 'id');
    }

    public function users() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }


}
