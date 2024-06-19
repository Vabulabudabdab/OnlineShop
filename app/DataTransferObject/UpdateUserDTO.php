<?php

namespace App\DataTransferObject;

use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Http\UploadedFile;
use Illuminate\Validation\Rules\ImageFile;

class UpdateUserDTO {
    /**
     * @param string $email
     * @param $image
     * @param int $role_id
     */
    public function __construct(

        public string $name,
        public string $email,
        public string  $image,
        public int $role_id,

    ) {}
}
