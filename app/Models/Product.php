<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = ['title', 'price', 'category', 'image'];

    public function category() {
        return $this->hasOne(Category::class, 'id', 'category');
    }

    public function tags() {
        return $this->belongsToMany(Tag::class, 'products_tags', 'product', 'tag');
    }

}
