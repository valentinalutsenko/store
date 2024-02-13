<?php

namespace App\Services\Registers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;


class RegisterService
{
    public function registerUser(RegisterRequest $request): RedirectResponse
    {
        $user = User::create($request->validated());
        auth()->login($user);

        return redirect('/api')->with('Учетная запись успешно зарегестированна');
    }
}


//{
//    "name": "",
//    "email": "@mail.ru",
//    "password": "12345678",
//    "password_confirmation": "12345678"
//}
