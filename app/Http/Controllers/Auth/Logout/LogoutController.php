<?php

namespace App\Http\Controllers\Auth\Logout;

use App\Http\Controllers\Controller;
use App\Http\Resources\Login\LoginResource;
use App\Services\Login\LoginUserService;

class LogoutController extends Controller
{
    /**
     * @param LoginUserService $loginService
     */
    public function __construct(private LoginUserService $loginService)
    {
        $this->loginService = $loginService;
    }

    /**
     * @return LoginResource
     */
    public function logout(): LoginResource
    {
        $login = $this->loginService->logout();

        return new LoginResource($login);
    }
}
