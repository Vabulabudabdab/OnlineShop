<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_Tag extends Model
{
    use HasFactory;

    protected $table = 'products_tags';
    protected $fillable = ['products', 'tag'];

    public function product() {
        return $this->belongsTo(Product::class, 'product', 'id');
    }

    public function relatedTags() {
        return $this->belongsTo(Tag::class, 'tag', 'id');
    }

}
