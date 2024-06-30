<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Requests\Tag\StoreRequest;

class StoreController extends BaseController {

    public function __invoke(StoreRequest $request) {

        $data = $request->validated();

        $tag = $this->service->store($data);

        return redirect()->route('admin.tags.show', compact('tag'));
    }

}
