<?php

namespace App\Services\Products;

use App\Http\Resources\Product\ProductResource;
use App\Models\Product;

class ProductService
{
    public function createProduct()
    {
        $products = Product::all();
        return ProductResource::collection($products);
    }
}
