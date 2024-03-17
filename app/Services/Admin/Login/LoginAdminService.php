<?php

namespace App\Services\Admin\Login;

use App\DTO\Login\LoginData;
use App\Exceptions\User\InvalidUserCredentialsException;
use Illuminate\Support\Facades\Auth;

class LoginAdminService
{
    /**
     * @param LoginData $data
     * @return array
     * @throws InvalidUserCredentialsException
     */
    public function loginAdmin(LoginData $data): array
    {
        if (! Auth::check() && Auth::user()->is_admin) {
            throw new InvalidUserCredentialsException('Invalid user credentials');
        }
        $token = auth()->user()->createToken('api_login');

        return ['token' => $token->plainTextToken];
    }
}
