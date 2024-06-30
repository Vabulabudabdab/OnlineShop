<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Requests\Category\UpdateRequest;
use App\Models\Category;

class UpdateController extends BaseController {

    public function __invoke(Category $category, UpdateRequest $request) {

        $data = $request->validated();

        $this->service->update($data, $category);

        return redirect()->route('admin.categories.show', $category);
    }

}
