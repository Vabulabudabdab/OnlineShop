<?php

namespace App\Http\Controllers\Admin\Product;

use App\Models\Product;

class ShowController extends BaseController {

    public function __invoke(Product $product) {


        $related_tags = $this->service->showTags($product);

        return view('admin.products.show', compact('product', 'related_tags'));
    }

}
