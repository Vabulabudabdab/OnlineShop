<?php

namespace App\DataTransferObject;

class CreatePostDTO {
    public function __construct(
        public string $title,
        public string $description,
        public int $category_id,
        public array $tag_ids,
        public string $main_image,
        public string $preview_image,
        public string $content,
    )
    {}
}
