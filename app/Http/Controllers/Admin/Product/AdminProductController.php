<?php

namespace App\Http\Controllers\Admin\Product;

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
     * @return ProductResource
     */
    public function index(): ProductResource
    {
        $product = $this->productAdminService->getAllProduct();

        return new ProductResource($product);
    }

    /**
     * @param ProductRequest $request
     * @return ProductResource
     */
    public function store(ProductRequest $request): ProductResource
    {
        $product = $this->productAdminService->createProduct($request->data());

        return new ProductResource($product);
    }

    /**
     * @param ProductRequest $request
     * @param Product $product
     * @return ProductResource
     */
    public function edit(ProductRequest $request, Product $product): ProductResource
    {
        $productId = $request->get('id');
        $categoryId = $request->get('category_id');
        $productEdit = $this->productAdminService->editProduct($request->data(), $categoryId, $product, $productId);

        return new ProductResource($productEdit);
    }

    /**
     * @param ProductRequest $request
     * @return Response
     */
    public function destroy(ProductRequest $request): Response
    {
        $id = $request->get('id');
        $this->productAdminService->deleteProduct($id);

        return response(null, 204)->noContent();
    }
}
