<?php

namespace App\DataTransferObject;

class CreateCategoryDTO
{
    public function __construct(
        readonly string $title
    )
    {}
}
