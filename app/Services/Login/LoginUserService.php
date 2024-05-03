<?php

namespace App\Services\Login;

use App\DTO\Login\LoginData;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginUserService
{
    /**
     * @param LoginData $data
     * @return array
     */
    public function loginUser(LoginData $data): array
    {
        if (auth()->guard('web')->attempt($data->toArray())) {
            $token = auth()->user()->createToken('api_login');
        }

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
