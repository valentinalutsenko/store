<?php

namespace App\Services\Products;

use App\Models\Product\Product;

class ProductService
{
    /**
     * @return array
     */
    public function getAllProducts(): array
    {
        return Product::paginate(10);
    }

    /**
     * @param int $id
     * @return object
     */
    public function getProduct(int $id): object
    {
        return Product::find($id);
    }
}
