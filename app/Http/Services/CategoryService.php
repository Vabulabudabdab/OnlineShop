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
               'title' => $title,
            ]);

            DB::commit();
        } catch (Exception $exception) {
            abort(500);
            DB::rollBack();
        }

    return $category;
    }

    /**
     * @param $data
     * @param Category $category
     * @return Category
     */

    public function update($data, Category $category) {

        if(!empty($data['title'])) {
            $title = $data['title'];
        }

        try {
            DB::beginTransaction();

            $category->update([
                'title' => $title
            ]);

            DB::commit();
        } catch (\Exception $exception) {
            abort(500);
            DB::rollBack();
        }
    }

    /**
     * @param Category $category
     * @return void
     */

    public function delete(Category $category) : void {
        $category->delete();
    }

}
