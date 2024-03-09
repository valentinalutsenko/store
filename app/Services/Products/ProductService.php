<?php

namespace App\Services\Products;

use App\Http\Resources\Product\ProductResource;
use App\Models\Product\Product;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductService
{
    public function getAllProducts(): ResourceCollection
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
