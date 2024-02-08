<?php

namespace App\Http\Controllers;

use App\Services\Products\ProductService;

class ProductController extends Controller
{
    public function __construct(private ProductService $productService)
    {
        $this->ProductService = $productService;
    }
    public function store()
    {
        return $this->productService->createProduct();
    }
}
