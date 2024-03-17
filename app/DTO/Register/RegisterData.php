<?php

namespace App\DTO\Register;

use Spatie\LaravelData\Data;

class RegisterData extends Data
{
    public function __construct(
        public string $name,
        public string $login,
        public string $email,
        public string $password,
    ) {
    }
}
