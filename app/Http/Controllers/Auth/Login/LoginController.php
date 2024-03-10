<?php

namespace App\Http\Controllers\Auth\Login;

use App\Http\Controllers\Controller;
use App\Http\Requests\Login\LoginRequest;
use App\Services\Login\LoginService;
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
}
