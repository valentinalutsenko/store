<?php

namespace App\Http\Controllers\Admin\Login;

use App\Http\Requests\Login\LoginRequest;
use App\Http\Resources\Login\LoginResource;
use App\Services\Admin\Login\LoginAdminService;
use Illuminate\Routing\Controller;

class LoginAdminController extends Controller
{
    /**
     * @param LoginAdminService $loginAdminService
     */
    public function __construct(private LoginAdminService $loginAdminService)
    {
        $this->loginAdminService = $loginAdminService;
    }

    /**
     * @throws \App\Exceptions\User\InvalidUserCredentialsException
     */
    public function login(LoginRequest $request): LoginResource
    {
        $login = $this->loginAdminService->loginAdmin($request->data());

        return new LoginResource($login);
    }
}
