<?php

namespace App\Services\Login;

use App\Http\Requests\Login\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginService
{
    /**
     * @return array|bool
     */
    public function loginUser(LoginRequest $request): array
    {
        $credentials = $request->only('email', 'password');

        if (! Auth::attempt($credentials)) {
            return false;
        }

        if (Auth::check() && Auth::user()->is_admin) {
            return true;
        }

        return $credentials;
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();

        return redirect('login');
    }
}
