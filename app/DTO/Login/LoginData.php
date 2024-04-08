<?php

namespace App\DTO\Login;

//use \Spatie\LaravelData\Optional;
use Spatie\LaravelData\Data;

class LoginData extends Data
{
    /**
     * @param string|null $login
     * @param string|null $email
     * @param string $password
     */
    public function __construct(
        public ?string $login,
        public ?string $email,
        public string $password,
    ) {
    }
}
