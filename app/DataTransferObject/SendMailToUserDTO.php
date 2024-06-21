<?php

namespace App\DataTransferObject;

class SendMailToUserDTO {
    public function __construct(
        readonly string $email,
        public int $status,
    )
    {}

}
