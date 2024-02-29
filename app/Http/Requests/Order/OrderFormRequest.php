<?php

namespace App\Http\Requests\Order;

use App\Http\Requests\BaseRequest;

class OrderFormRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|max:255',
            'address' => 'required|max:255',
        ];
    }
}
