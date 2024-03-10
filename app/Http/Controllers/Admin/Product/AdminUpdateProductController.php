<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductRequest;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product\Product;
use App\Services\Admin\AdminProductService;
use Illuminate\Http\JsonResponse;


class AdminUpdateProductController extends Controller
{
    public function __construct(private AdminProductService $productAdminService)
    {
        $this->productAdminService = $productAdminService;
    }
    public function store(ProductRequest $request, Product $product): ProductResource
    {
        $product = $this->productAdminService->updateProduct($request, $product);
        return new ProductResource($product);
    }
}
