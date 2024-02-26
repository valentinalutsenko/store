<?php

namespace App\Services\Login;

use App\Http\Requests\LoginRequest;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginService
{
    public function loginUser(LoginRequest $request): Response
    {
        $credentials = $request->only('email', 'password');

        if(!Auth::attempt($credentials)){
            return response()->json('Данные введены неверно!', 400);
        };

        if(Auth::check() && Auth::user()->isAdmin()) {
            return response()->json('Вы успешно вошли на страницу администатора!', 200);
        }
        return response()->json('Вы успешно автризовались!', 200);

    }

    public function logout(): RedirectResponse
    {
        Auth::logout();

        return redirect('login');
    }
}

