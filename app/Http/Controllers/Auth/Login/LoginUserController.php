<?php

namespace App\Http\Controllers\Auth\Login;

use App\Http\Controllers\Controller;
use App\Http\Requests\Login\LoginRequest;
use App\Http\Resources\Login\LoginResource;
use App\Services\Login\LoginUserService;

class LoginUserController extends Controller
{
    public function __construct(private LoginUserService $loginUserService)
    {
        $this->loginUserService = $loginUserService;
    }

    public function login(LoginRequest $request): LoginResource
    {
        $login = $this->loginUserService->loginUser($request->data());

        return new LoginResource($login);
    }
}
