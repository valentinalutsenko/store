<?php

namespace App\Services\Products;

use App\Http\Resources\Product\ProductResource;
use App\Models\Product;
class ProductService
{
    public function createProduct(): object
    {
        $products = Product::all();
        return ProductResource::collection($products);

    }
    public function getProduct($id): object
    {
        return Product::where('id', $id)->first();
    }
}
