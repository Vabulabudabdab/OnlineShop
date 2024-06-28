<?php

namespace App\Http\Services;

use App\DataTransferObject\CreateCategoryDTO;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class CategoryService {

    /**
     * create new Category
     */

    public function store(CreateCategoryDTO $dto) {

        $title = $dto->title;

        try {
            DB::beginTransaction();

            $category = Category::firstOrCreate([
               'title' => $dto->title,
            ]);

            DB::commit();
        } catch (Exception $exception) {
            abort(500);
            DB::rollBack();
        }

    return $category;
    }

    public function delete(Category $category) : void {
        $category->delete();
    }

}
