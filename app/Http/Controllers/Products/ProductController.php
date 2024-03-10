<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product\ProductResource;
use App\Services\Products\ProductService;

class ProductController extends Controller
{
    public function __construct(private ProductService $productService)
    {
        $this->productService = $productService;
    }
    //Получаем один товар
    public function store($id): ProductResource
    {
        $product = $this->productService->getProduct($id);
        return new ProductResource($product);
    }
}
