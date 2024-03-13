<?php

namespace App\Services\Registers;

use App\DTO\Register\RegisterData;
use App\Models\User\User;
use Symfony\Component\HttpFoundation\Response;

class RegisterService
{
    /**
     * @param RegisterData $data
     * @return array
     */
    public function registerUser(RegisterData $data): array
    {
        return User::create($data->toArray());
    }
}
