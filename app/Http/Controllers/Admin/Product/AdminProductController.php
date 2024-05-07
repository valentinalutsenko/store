<?php

namespace App\Http\Controllers\Admin\Product;

use App\DTO\Product\ProductData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductRequest;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product\Product;
use App\Services\Admin\Product\AdminProductService;
use Illuminate\Http\Response;

class AdminProductController extends Controller
{
    /**
     * @param AdminProductService $productAdminService
     */
    public function __construct(private AdminProductService $productAdminService)
    {
        $this->productAdminService = $productAdminService;
    }


    /**
     * @param int $count
     * @return ProductResource
     */
    public function index(int $count): ProductResource
    {
        $product = $this->productAdminService->getAllProduct($count);

        return new ProductResource($product);
    }

    /**
     * @param ProductRequest $request
     * @return ProductResource
     */
    public function store(ProductRequest $request): ProductResource
    {
        $product = $this->productAdminService->createProduct($request->getDto());

        return new ProductResource($product);
    }


    /**
     * @param ProductRequest $request
     * @param Product $product
     * @return ProductResource
     */
    public function update(ProductRequest $request, Product $product): ProductResource
    {
        $productUpdate = $this->productAdminService->editProduct($request->getDto(), $product);

        return new ProductResource($productUpdate);
    }

    /**
     * @param $id
     * @return Response
     */
    public function destroy($id): Response
    {
        $this->productAdminService->deleteProduct($id);

        return response()->noContent();
    }
}
