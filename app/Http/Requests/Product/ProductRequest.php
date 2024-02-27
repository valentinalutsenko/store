<?php


namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

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
