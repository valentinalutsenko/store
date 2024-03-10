<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product\Product;
use App\Services\Admin\AdminProductService;

class AdminDeleteProductController extends Controller
{
    public function __construct(private AdminProductService $productAdminService)
    {
        $this->productAdminService = $productAdminService;
    }
    public function store(Product $product): ProductResource
    {
       $product = $this->productAdminService->deleteProduct($product);
       return new ProductResource($product);
    }
}
