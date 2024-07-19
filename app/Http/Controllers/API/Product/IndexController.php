<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Requests\API\IndexRequest;
use App\Http\Resources\Test\IndexResource;

class IndexController {

    public function __invoke(IndexRequest $request) {
        $data = $request->validated();

        return IndexResource::collection($data);
    }

}
