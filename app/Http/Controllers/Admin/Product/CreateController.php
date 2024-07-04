<?php

namespace App\Http\Controllers\Admin\Product;

use App\Models\Category;
use App\Models\Tag;

class CreateController {

    public function __invoke() {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.products.create', compact('categories', 'tags'));
    }

}
