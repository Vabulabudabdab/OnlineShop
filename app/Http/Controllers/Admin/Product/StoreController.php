<?php

namespace App\Http\Controllers\Admin\Product;

use App\DataTransferObject\CreateProductDTO;
use App\Http\Requests\Product\StoreRequest;

class StoreController extends BaseController {

    public function __invoke(StoreRequest $request) {
        $data = $request->validated();

        $image = $this->service->image($data['image']);

        $this->service->store(new CreateProductDTO($data['title'], $data['price'], $image, $data['category_id'], $data['tag_ids']));

        return redirect()->route('admin.products.index');
    }

}
