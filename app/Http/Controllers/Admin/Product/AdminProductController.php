<?php

namespace App\Http\Controllers\Admin\Product;

use App\DTO\Product\ProductDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductRequest;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product\Product;
use App\Services\Admin\Product\AdminProductService;

class AdminProductController extends Controller
{
    public function __construct(private AdminProductService $productAdminService)
    {
        $this->productAdminService = $productAdminService;
    }

    public function index(): ProductResource
    {
        $product = $this->productAdminService->getAllProduct();

        return new ProductResource($product);
    }

    public function add(ProductDTO $request): ProductResource
    {
        $product = $this->productAdminService->addProduct($request);

        return new ProductResource($product);
    }

    public function update(ProductRequest $request, Product $product): ProductResource
    {
        $product = $this->productAdminService->updateProduct($request, $product);

        return new ProductResource($product);
    }

    public function delete(Product $product): ProductResource
    {
        $product = $this->productAdminService->deleteProduct($product);

        return new ProductResource($product);
    }
}
