<?php

namespace App\Http\Controllers\Admin\Product;

use App\DataTransferObject\UpdateProductDTO;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Product;

class UpdateController extends BaseController {

    public function __invoke(Product $product, UpdateRequest $request) {

        $data = $request->validated();

        $image = $this->service->updateImage($product, $data['image']);
        $this->service->update($product, new UpdateProductDTO($data['title'], $data['price'], $image, $data['category_id'], $data['tag_ids']));

        return redirect()->route('admin.products.show', compact('product'));
    }

}
