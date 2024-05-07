<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product\ProductResource;
use App\Services\Products\ProductService;

class ProductController extends Controller
{
    /**
     * @param ProductService $productService
     */
    public function __construct(private ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * @param int $id
     * @return ProductResource
     */
    public function show(int $id): ProductResource
    {
        $product = $this->productService->getProduct($id);

        return new ProductResource($product);
    }


    /**
     * @param int $count
     * @return ProductResource
     */
    public function index(int $count): ProductResource
    {
        $product = $this->productService->getAllProducts($count);

        return new ProductResource($product);
    }
}
