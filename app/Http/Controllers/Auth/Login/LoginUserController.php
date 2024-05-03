<?php

namespace App\Http\Controllers\Auth\Login;

use App\Http\Controllers\Controller;
use App\Http\Requests\Login\LoginRequest;
use App\Http\Resources\Login\LoginResource;
use App\Services\Login\LoginUserService;

class LoginUserController extends Controller
{
    /**
     * @param LoginUserService $loginUserService
     */
    public function __construct(private LoginUserService $loginUserService)
    {
        $this->loginUserService = $loginUserService;
    }

    /**
     * @param LoginRequest $request
     * @return LoginResource
     */
    public function login(LoginRequest $request): LoginResource
    {
        $login = $this->loginUserService->loginUser($request->getDto());

        return new LoginResource($login);
    }
}
