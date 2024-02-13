<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;
class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'name' => 'required|unique:users,name',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'password' => 'required|min:8'
        ];
    }
    public function getCredentials(): array
    {
        $user = $this->get('users');

        if($this->isEmail($user)) {
            return [
                'email' => $user,
                'password' =>  $this->get('password')
            ];
        }
        return $this->only('username', 'password');
    }

    private function isEmail($param): bool
    {
        $factory = $this->container->make(ValidationFactory::class);

        return !$factory->make(
            ['name' => $param],
            ['name' => 'email']
        )->fails();
    }
}
