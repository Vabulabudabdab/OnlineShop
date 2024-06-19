<?php

namespace App\DataTransferObject;

class CreateUserDTO {

    public function __construct(
        public string $email,
        public string $name,
        public int    $role_id,
        public string $password,
        public string $image
    )
    {}

}
