<?php

namespace App\Http\Controllers\Auth\Login;

use App\Http\Controllers\Auth\LoginResponse;
use App\Http\Controllers\Auth\LogoutResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Login\LoginRequest;
use App\Services\Login\LoginService;


class LoginController extends Controller
{
    public function __construct(private LoginService $loginService)
    {
        $this->loginService = $loginService;
    }
    public function login(LoginRequest $request): LoginResponse
    {
        $login =  $this->loginService->loginUser($request);
        return new LoginResponse($login);
    }
}
