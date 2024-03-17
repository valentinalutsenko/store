<?php

namespace App\Services\Login;

use App\DTO\Login\LoginData;
use App\Exceptions\User\InvalidUserCredentialsException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginUserService
{
    /**
     * @param LoginData $data
     * @return array
     * @throws InvalidUserCredentialsException
     */
    public function loginUser(LoginData $data): array
    {
        if (! auth()->guard('web')->attempt($data->toArray())) {
            throw new InvalidUserCredentialsException('Invalid user credentials');
        }
        $token = auth()->user()->createToken('api_login');

        return ['token' => $token->plainTextToken];
    }

    /**
     * @return RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        Auth::logout();

        return redirect('login');
    }
}
