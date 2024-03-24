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

    public function show(int $id): ProductResource
    {
        $product = $this->productService->getProduct($id);

        return new ProductResource($product);
    }

    public function index(): ProductResource
    {
        $product = $this->productService->getAllProducts();

        return new ProductResource($product);
    }
}
