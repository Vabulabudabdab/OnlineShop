<?php

namespace App\Http\Controllers\Admin\Product;

use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;

class EditController {

    public function __invoke(Product $product) {

        $tags = Tag::all();
        $categories = Category::all();

        return view('admin.products.edit', compact('product', 'tags', 'categories'));
    }

}
