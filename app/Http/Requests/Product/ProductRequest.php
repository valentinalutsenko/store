<?php

namespace App\Http\Requests\Product;

use App\DTO\Product\ProductData;
use App\Http\Requests\BaseRequest;

class ProductRequest extends BaseRequest
{
    /**
     * @return array[]
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|min:5|max:128',
            'price' => 'required|integer|min:1',
            'description' => 'nullable|string|min:10',
            'image' => 'nullable|string',
            'count' => 'required|integer|min:1',
            'category_id' => 'required|integer|min:1',
        ];
    }

    public function getDto(): ProductData
    {
        return ProductData::from($this->validated());
    }
}
