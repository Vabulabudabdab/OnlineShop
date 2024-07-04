<?php

namespace App\Http\Controllers\Admin\Product;

use App\Models\Product;

class DeleteController {

    public function __invoke(Product $product) {
       $product->delete();

       return redirect()->back();
    }

}
