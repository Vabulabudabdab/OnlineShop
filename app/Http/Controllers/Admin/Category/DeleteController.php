<?php

namespace App\Http\Controllers\Admin\Category;

use App\Models\Category;

class DeleteController extends BaseController {

    public function __invoke(Category $category) {

        $this->service->delete($category);

        return redirect()->back()->with('success_delete_category', "Категория успешно удалена");

    }

}
