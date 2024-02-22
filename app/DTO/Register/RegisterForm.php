<?php

namespace App\DTO\Register;

use Illuminate\Http\Request;

class RegisterForm extends \Illuminate\Http\Request
{
    public string $name;
    public string $email;
    public string $password;
    public string $password_confirmation;


    public function __construct(string $name,
                                string $email,
                                string $password,
                                string $password_confirmation)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->password_confirmation = $password_confirmation;
    }

    public static function formRequest(Request $request): RegisterForm
    {
        return new static (
            $request->get('name'),
            $request->get('email'),
            $request->get('password'),
            $request->get('password_confirmation')
        );
    }

}
