<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\Login\LoginService;
use Illuminate\Http\RedirectResponse;



class LoginController extends Controller
{
    public function __construct(private LoginService $loginService)
    {
        $this->loginService = $loginService;
    }
    public function login(LoginRequest $request): RedirectResponse
    {
        return $this->loginService->loginUser($request);
    }

    public function logout(): RedirectResponse
    {
        return $this->loginService->logout();
    }
}
