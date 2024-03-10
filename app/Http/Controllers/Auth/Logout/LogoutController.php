<?php

namespace App\Http\Controllers\Auth\Logout;

use App\Http\Controllers\Auth\LogoutResponse;
use App\Http\Controllers\Controller;
use App\Services\Login\LoginService;
use Symfony\Component\HttpFoundation\RedirectResponse;


class LogoutController extends Controller
{
    public function __construct(private LoginService $loginService)
    {
        $this->loginService = $loginService;
    }

    public function logout(): RedirectResponse
    {
       return $this->loginService->logout();
    }
}
