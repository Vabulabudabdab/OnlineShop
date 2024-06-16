<?php

namespace App\DataTransferObject;

class UpdateUserDTO {
    /**
     * @param string $email
     * @param $image
     * @param int $role_id
     */
    public function __construct(

        public string $email,
        public     [] $image,
        public int $role_id,

    ) {}
}
