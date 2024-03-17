<?php

namespace App\Services\Registers;

use App\DTO\Register\RegisterData;
use App\Models\User\User;

class RegisterService
{
    /**
     * @param RegisterData $data
     * @return array
     */
    public function register(RegisterData $data): array
    {
        return User::create($data->toArray());
    }
}
