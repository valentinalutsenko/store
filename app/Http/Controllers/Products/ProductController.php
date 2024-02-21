<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product\ProductCollection;
use App\Models\Product;
use App\Services\Products\ProductService;
use http\Env\Response;

class ProductController extends Controller
{
    public function __construct(private ProductService $productService)
    {
        $this->productService = $productService;
    }
    //Получаем все товары
    public function store(ProductCollection $request)
    {
        return $this->productService->getAllProducts($request);
    }
    //Получаем один товар
    public function show($id)
    {
        return $this->productService->getProduct($id);
    }
}
