<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Services\Login\LoginService;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;




class LoginController extends Controller
{
    public function __construct(private LoginService $loginService)
    {
        $this->loginService = $loginService;
    }
    public function login(LoginRequest $request): Response
    {
        return $this->loginService->loginUser($request);
    }

    public function logout(): RedirectResponse
    {
        return $this->loginService->logout();
    }
}
