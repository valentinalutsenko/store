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
     */
    public function loginAdmin(LoginData $data): array
    {
        if (Auth::check() && Auth::user()->is_admin) {
            $token = auth()->user()->createToken('api_login');
        }

        return ['token' => $token->plainTextToken];
    }
}
