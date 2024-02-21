<?php

namespace App\Services\Products;

use App\Models\Product;

class ProductService
{
    public function getAllProducts($products): object
    {
       $products = Product::with('products')->find($products);
      dd($products);
//       return $products;

    }
    public function getProduct($id): object
    {
        return Product::with('category')->where('title', $id)->first();
    }
}
