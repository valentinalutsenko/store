<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Services\Admin\ProductAdminService;
use Illuminate\Http\JsonResponse;


class AdminDeleteProductController extends Controller
{
    public function __construct(private ProductAdminService $productAdminService)
    {
        $this->productAdminService = $productAdminService;
    }
    public function store(Product $product): JsonResponse
    {
        return $this->productAdminService->deleteProduct($product);
    }
}
