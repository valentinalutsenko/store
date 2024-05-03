<?php

namespace App\Services\Products;

use App\Models\Product\Product;

class ProductService
{
    /**
     * @param int $page
     * @return array
     */
    public function getAllProducts(int $page): array
    {
        return Product::paginate($page);
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
