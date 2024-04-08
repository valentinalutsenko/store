<?php

namespace App\Http\Requests\Order;

use App\DTO\Order\OrderData;
use App\Http\Requests\BaseRequest;

class OrderFormRequest extends BaseRequest
{
    /**
     * @return array[]
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'min:5', '
                 max:128',
            ],
            'email' => [
                'required',
                'email',
                'min:1',
            ],
            'phone' => [
                'nullable',
                'string',
                'min:10',
            ],
            'address' => [
                'string',
                'required',
                'min:5',
            ],
        ];
    }

    /**
     * @return OrderData
     */
    public function data(): OrderData
    {
        return OrderData::from($this->validated());
    }
}
