<?php

namespace App\Http\Controllers\Admin\Product;

use App\Models\Product;

class IndexController {

    public function __invoke() {

        $products = Product::paginate(9);

        return view('admin.products.index', compact('products'));
    }

}
