<?php

namespace App\DataTransferObject;

class UpdateProductDTO {

    public function __construct(
         public string $title,
         public int $price,
         public string|null $file_path,
         public int $category_id,
         public array $tag_ids
    )
    {}

}
