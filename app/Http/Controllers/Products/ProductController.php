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
    //Получаем все товары
    public function store(): object
    {
        return $this->productService->getAllProducts();
    }
    //Получаем один товар
    public function show($id)
    {
        return $this->productService->getProduct($id);
    }
}
