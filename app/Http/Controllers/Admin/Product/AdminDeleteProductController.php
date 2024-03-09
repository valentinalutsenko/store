<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use App\Services\Admin\AdminProductService;
use Illuminate\Http\JsonResponse;


class AdminDeleteProductController extends Controller
{
    public function __construct(private AdminProductService $productAdminService)
    {
        $this->productAdminService = $productAdminService;
    }
    public function store(Product $product): ProductResponse
    {
        $product = $this->productAdminService->deleteProduct($product);
        return new ProductResponse($product);
    }
}
