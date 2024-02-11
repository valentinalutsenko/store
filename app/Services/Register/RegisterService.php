<?php

namespace App\Services\Register;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;


class RegisterService
{
    //Обработка запроса на регистрацию учетной записи
    public function register(RegisterRequest $request): RedirectResponse
    {
        $user = User::create($request->validated());
        auth()->login($user);

        return redirect('/')->with('Учетная запись успешно зарегестированна');
    }
}
