<?php

namespace App\Http\Services;

use App\DataTransferObject\CreateProductDTO;
use App\DataTransferObject\UpdateProductDTO;
use App\Models\Product;
use App\Models\Product_Tag;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Mockery\Exception;

class ProductService {

    /**
     * @param CreateProductDTO $DTO
     * @return void
     */
    public function store(CreateProductDTO $DTO) {

        $tagIds = $DTO->tag_ids;

        try {
            DB::beginTransaction();

            $product = Product::create([
                'title' => $DTO->title,
                'price' => $DTO->price,
                'image' => $DTO->file_path,
                'category' => $DTO->category_id
            ]);

            $product->tags()->attach($tagIds);

            DB::commit();
        } catch (\Exception $exception) {
            dd($exception);
            abort(500);
            DB::rollback();
        }

    }

    /**
     * @param Product $product
     * @param UpdateProductDTO $DTO
     * @return void
     */
    public function update(Product $product, UpdateProductDTO $DTO) {

        $tagIds = $DTO->tag_ids;

        try {
            DB::beginTransaction();

            if($DTO->file_path != null) {
                $product->update([
                    'title' => $DTO->title,
                    'price' => $DTO->price,
                    'image' => $DTO->file_path,
                    'category' => $DTO->category_id
                ]);
            } else {
                $product->update([
                    'title' => $DTO->title,
                    'price' => $DTO->price,
                    'category' => $DTO->category_id
                ]);
            }

            if(isset($tagIds)) {
                $product->tags()->sync($tagIds);
            }

            DB::commit();
        } catch (Exception $exception) {
            dd($exception);
            abort(500);
            DB::rollBack();
        }

    }

    /**
     * @param Product $product
     * @return mixed
     */

    public function showTags(Product $product) {
        $related_tags = Product_Tag::all()->where('product', $product->id);

        return $related_tags;
    }

    /**
     * @param $image
     * @return $image
     */

    public function image($image) {

        $file_path = Storage::disk('public')->put('/images', $image);

        return $file_path;
    }


    /**
     * @param Product $product
     * @param $newImage
     * @return file_path
     */
    public function updateImage(Product $product, $newImage) {

        $image = Product::all('image')->where('id', $product->id)->first();

        if(!empty($image) && !empty($newImage)) {
            try {
                DB::beginTransaction();

                Storage::disk('public')->delete('/images', $image);

                $file_path = Storage::disk('public')->put('/images', $newImage);

                DB::commit();
            } catch (\Exception $exception) {
                dd($exception);
                abort(500);
                DB::rollBack();
            }
        } else {
            $file_path = Storage::disk('public')->put('/images', $newImage);
        }

        return $file_path;
    }

}
