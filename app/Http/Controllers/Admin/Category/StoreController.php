<?php

namespace App\Http\Controllers\Admin\Category;

use App\DataTransferObject\CreateCategoryDTO;
use App\Http\Requests\Category\StoreRequest;

class StoreController extends BaseController {

    public function __invoke(StoreRequest $request) {

        $data = $request->validated();

        $title = $data['title'];

        $category = $this->service->store(new CreateCategoryDTO($title));

        return redirect()->route('admin.categories.show', compact('category'))->with('success_create_category', "Категория успешно создана!");

    }

}
