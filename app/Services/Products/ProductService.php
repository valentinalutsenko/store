<?php

namespace App\Services\Products;

use App\Http\Resources\Product\ProductResource;
use App\Models\Product;

class ProductService
{
    public function getAllProducts(): object
    {
        $products = Product::all();
        return ProductResource::collection($products);
    }
    public function getProduct($id): object
    {
        $product = Product::find($id);
        return $product;
    }
}
