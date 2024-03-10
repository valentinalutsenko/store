<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductRequest;
use App\Http\Resources\Product\ProductResource;
use App\Services\Admin\AdminProductService;
use Illuminate\Http\JsonResponse;


class AdminAddProductController extends Controller
{
    public function __construct(private AdminProductService $productAdminService)
    {
        $this->productAdminService = $productAdminService;
    }
    public function store(ProductRequest $request): ProductResource
    {
        $product = $this->productAdminService->addProduct($request);
        return new ProductResource($product);

    }
}
