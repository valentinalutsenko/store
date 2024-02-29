<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Services\Products\ProductService;
use Illuminate\Http\Resources\Json\ResourceCollection;


class ProductAllController extends Controller
{
    public function __construct(private ProductService $productService)
    {
        $this->productService = $productService;
    }
    //Получаем все товары
    public function store(): ResourceCollection
    {
        return $this->productService->getAllProducts();
    }
}
