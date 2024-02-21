<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
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
        return $this->registerService->registerUser($request);
    }
}
