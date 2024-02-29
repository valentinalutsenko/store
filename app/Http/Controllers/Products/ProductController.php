<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Services\Products\ProductService;
use Illuminate\Http\Resources\Json\ResourceCollection;


class ProductController extends Controller
{
    public function __construct(private ProductService $productService)
    {
        $this->productService = $productService;
    }
    //Получаем один товар
    public function store($id): ResourceCollection
    {
        return $this->productService->getProduct($id);
    }
}
