<?php

namespace App\DTO\Register;

use Spatie\LaravelData\Data;

class RegisterData extends Data
{
    /**
     * @param string $name
     * @param string $login
     * @param string $email
     * @param string $password
     */
    public function __construct(
        public string $name,
        public string $login,
        public string $email,
        public string $password,
    ) {
    }
}
