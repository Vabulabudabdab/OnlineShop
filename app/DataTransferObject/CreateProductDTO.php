<?php

namespace App\DataTransferObject;

class CreateProductDTO {

    /**
     * @param string|null $title
     * @param int $price
     * @param string $file_path
     * @param int $category_id
     * @param array $tag_ids
     */
    public function __construct(
        public string $title,
        public int     $price,
        public string  $file_path,
        public int     $category_id,
        public array   $tag_ids
    )
    {}

}
