<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = ['title', 'category_id', 'user_id', 'description', 'content', 'preview_image', 'main_image'];

    public function categories() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function tags() {
        return $this->belongsToMany(Tag::class, 'posts_tags', 'post_id', 'tag_id');
    }

    public function users() {
        return $this->hasOne(User::class, 'user_id', 'id');
    }

    public function comments() {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }

}
