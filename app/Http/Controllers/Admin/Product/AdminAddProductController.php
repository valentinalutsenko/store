<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductRequest;
use App\Services\Admin\ProductAdminService;
use Illuminate\Http\JsonResponse;


class AdminAddProductController extends Controller
{
    public function __construct(private ProductAdminService $productAdminService)
    {
        $this->productAdminService = $productAdminService;
    }
    public function store(ProductRequest $request): JsonResponse
    {
        return $this->productAdminService->addProduct($request);
    }
}