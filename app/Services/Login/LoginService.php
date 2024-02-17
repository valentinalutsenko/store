<?php

namespace App\Services\Login;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginService
{
    public function loginUser(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)){
            return redirect()->to('api/dashboard')->with('success', 'Your message has been sent!');
        };

        return redirect()->to('api/login')->with('Error! The entered data is incorrect');
    }

    public function logout(): RedirectResponse
    {
        Session::flush();

        Auth::logout();

        return redirect('api/login');
    }
}
