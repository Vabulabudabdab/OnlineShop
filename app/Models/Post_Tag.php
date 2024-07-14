<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post_Tag extends Model
{
    use HasFactory;

    protected $table = 'posts_tags';
    protected $fillable = ['post_id', 'tag_id'];
}
