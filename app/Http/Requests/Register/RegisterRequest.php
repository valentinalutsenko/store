<?php

namespace App\Http\Requests\Register;

use App\DTO\Register\RegisterData;
use App\Http\Requests\BaseRequest;

class RegisterRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|unique:users,name',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
        ];
    }

    public function data(): RegisterData
    {
        return RegisterData::from($this->validated());
    }
}
