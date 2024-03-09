<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductRequest;
use App\Models\Product\Product;
use App\Services\Admin\AdminProductService;


class AdminUpdateProductController extends Controller
{
    public function __construct(private AdminProductService $productAdminService)
    {
        $this->productAdminService = $productAdminService;
    }
    public function store(ProductRequest $request, Product $product): ProductResponse
    {
        $product = $this->productAdminService->updateProduct($request, $product);
        return new ProductResponse($product);
    }
}
