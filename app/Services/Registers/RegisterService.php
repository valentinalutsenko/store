<?php

namespace App\Services\Registers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;


class RegisterService
{

    public function registerUser(RegisterRequest $request): Response
    {
        $user = User::create($request->validated());
        return response()->json('Учетная запись успешно зарегестированна', 200);
    }
}


//TODO: пробовала сделать через DTO, не смогла до конца разобраться, оставила старый вариант регистрации

//    public function registerUser(RegisterForm $request): Response
//    {
//        $data = RegisterForm::formRequest($request);
//        $user = User::create($data);
//        return response('Учетная запись успешно зарегестированна', 200);
//    }

