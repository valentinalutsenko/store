<?php

namespace App\Services\Registers;

use App\Models\User\User;
use Symfony\Component\HttpFoundation\Response;


class RegisterService
{
    public function registerUser($data): Response
    {
        $user = User::create($data);
        return response()->json('Учетная запись успешно зарегестированна', 200);
    }
}

