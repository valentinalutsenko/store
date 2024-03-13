<?php

namespace App\Http\Controllers\Auth\Logout;

use App\Http\Controllers\Controller;
use App\Services\Login\LoginService;

class LogoutController extends Controller
{
    public function __construct(private LoginService $loginService)
    {
        $this->loginService = $loginService;
    }

    public function logout(): LoginResource
    {
        $login = $this->loginService->logout();

        return new LoginResource($login);
    }
}
