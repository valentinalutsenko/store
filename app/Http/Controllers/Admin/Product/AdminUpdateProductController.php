<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductRequest;
use App\Models\Product;
use App\Services\Admin\ProductAdminService;
use Illuminate\Http\JsonResponse;


class AdminUpdateProductController extends Controller
{
    public function __construct(private ProductAdminService $productAdminService)
    {
        $this->productAdminService = $productAdminService;
    }
    public function store(ProductRequest $request, Product $product): JsonResponse
    {
        return $this->productAdminService->updateProduct($request, $product);
    }
}
