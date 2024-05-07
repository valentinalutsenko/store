<?php

namespace App\Services\Products;

use App\Models\Product\Product;

class ProductService
{
    /**
     * @param int $count
     * @return array
     */
    public function getAllProducts(int $count): array
    {
        return Product::paginate($count);
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
