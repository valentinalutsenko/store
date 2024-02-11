<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Services\Register\RegisterService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;



class RegisterController extends Controller
{
    public function __construct(private RegisterService $registerService)
    {
        $this->registerService = $registerService;
    }
    public function store(RegisterRequest $request): RedirectResponse
    {
        return $this->registerService->register($request);
    }
}
