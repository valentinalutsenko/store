<?php

namespace App\Services\Products;

use App\Models\Product\Product;

class ProductService
{
    public function getAllProducts(): array
    {
        return Product::paginate(10)->toArray();
    }

    public function getProduct(int $id): object
    {
        return Product::find($id)->toArray();
    }
}
