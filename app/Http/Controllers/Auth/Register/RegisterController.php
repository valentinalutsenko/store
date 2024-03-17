<?php

namespace App\Http\Controllers\Auth\Register;

use App\Http\Controllers\Controller;
use App\Http\Requests\Register\RegisterRequest;
use App\Http\Resources\Register\RegisterResource;
use App\Services\Registers\RegisterService;

class RegisterController extends Controller
{
    public function __construct(private RegisterService $registerService)
    {
        $this->registerService = $registerService;
    }

    public function register(RegisterRequest $request): RegisterResource
    {
        $register = $this->registerService->register($request->data());

        return new RegisterResource($register);
    }
}
