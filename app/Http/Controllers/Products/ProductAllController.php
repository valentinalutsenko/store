<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Services\Products\ProductService;

class ProductAllController extends Controller
{
    public function __construct(private ProductService $productService)
    {
        $this->productService = $productService;
    }
    //Получаем все товары
    public function store(): ProductResponse
    {
        $product = $this->productService->getAllProducts();
        return new ProductResponse($product);

    }
}
