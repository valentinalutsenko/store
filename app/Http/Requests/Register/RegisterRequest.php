<?php

namespace App\Http\Requests\Register;

use App\DTO\Register\RegisterData;
use App\Http\Requests\BaseRequest;

class RegisterRequest extends BaseRequest
{
    /**
     * @return array[]
     */
    public function rules(): array
    {
        return [
            'login' => 'nullable|unique:users,login',
            'email' => 'nullable|unique:users,email',
            'password' => 'required|min:5|confirmed',
            'name' => 'required|max:255',
        ];
    }

    public function getDto(): RegisterData
    {
        return RegisterData::from($this->validated());
    }
}
