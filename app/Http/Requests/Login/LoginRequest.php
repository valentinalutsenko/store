<?php

namespace App\Http\Requests\Login;

use App\DTO\Login\LoginData;
use App\Http\Requests\BaseRequest;

class LoginRequest extends BaseRequest
{
    /**
     * @return array[]
     */
    public function rules(): array
    {
        return [
            'login' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'password' => 'required',
        ];
    }

    public function getDto(): LoginData
    {
        return LoginData::from($this->validated());
    }
}
