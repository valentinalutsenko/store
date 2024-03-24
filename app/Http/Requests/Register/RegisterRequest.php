<?php

namespace App\Http\Requests\Register;

use App\DTO\Register\RegisterData;
use App\Http\Requests\BaseRequest;

class RegisterRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'max:255',
            ],
            'login' => [
                'required',
                'unique:users,login',
            ],
            'email' => [
                'required',
                'unique:users,email',
                'max:255',
            ],
            'password' => [
                'required',
                'min:5', 'confirmed',
            ],
        ];
    }

    public function data(): RegisterData
    {
        return RegisterData::from($this->validated());
    }
}
