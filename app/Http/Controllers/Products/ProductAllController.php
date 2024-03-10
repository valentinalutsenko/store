<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product\ProductResource;
use App\Services\Products\ProductService;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductAllController extends Controller
{
    public function __construct(private ProductService $productService)
    {
        $this->productService = $productService;
    }
    //Получаем все товары
    public function store(): ProductResource
    {
        $product = $this->productService->getAllProducts();
        return new ProductResource($product);
    }
}
