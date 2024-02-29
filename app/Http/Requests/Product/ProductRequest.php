<?php


namespace App\Http\Requests\Product;

use App\Http\Requests\BaseRequest;

class ProductRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|min:5',
            'price' => 'required|min:1',
            'description' => 'required|min:20',
            'category_id' => 'required|integer|min:1'
        ];
    }
}
