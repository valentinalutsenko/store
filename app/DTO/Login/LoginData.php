<?php

namespace App\DTO\Login;

//use \Spatie\LaravelData\Optional;
use Spatie\LaravelData\Data;

class LoginData extends Data
{
    //Для необязательных параметров лучше использовать Optional, но он не импортируется
    public function __construct(
        public ?string $login,
        public ?string $email,
        public string $password,
    ) {
    }
}
