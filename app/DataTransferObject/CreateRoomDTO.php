<?php

namespace App\DataTransferObject;

class CreateRoomDTO {

    public function __construct(
        public string $name,
        readonly string $description,
        public int $status
    )
    {}

}
