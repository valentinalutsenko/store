<?php

namespace App\Http\Controllers\Auth\Register;

use App\Http\Controllers\Controller;
use App\Http\Requests\Register\RegisterRequest;
use App\Services\Registers\RegisterService;
use Symfony\Component\HttpFoundation\Response;


class RegisterController extends Controller
{
    public function __construct(private RegisterService $registerService)
    {
        $this->registerService = $registerService;
    }
    public function register(RegisterRequest $request): Response
    {
        $data = $request->validated();
        return $this->registerService->registerUser($data);
    }
}
