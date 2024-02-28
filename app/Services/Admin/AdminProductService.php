<?php

namespace App\Services\Admin;

use App\Http\Requests\Product\ProductRequest;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;

class AdminProductService
{
    //Просмотр всех товаров
    public function getAllProduct(): Collection
    {
        return Product::all();
    }

    //Создает новый товар
    public function addProduct(ProductRequest $request): JsonResponse
    {
        $request->merge([
            'new' => $request->has('new'),
            'hit' => $request->has('hit'),
            'sale' => $request->has('sale'),
        ]);
        $data = $request->all();
        $product = Product::create($data);

        return response()->json('Новый товар успешно создан!', 200);
    }

    //Обновляет товар
    public function updateProduct(ProductRequest $request, Product $product): JsonResponse
    {
        $request->merge([
            'new' => $request->has('new'),
            'hit' => $request->has('hit'),
            'sale' => $request->has('sale'),
        ]);
        $data = $request->all();
        $product->update($data);

        return response()->json('Товар был успешно обновлен!', 200);
    }
    //Удаляет товар
    public function deleteProduct(Product $product): JsonResponse
    {
        $product->delete();
        return response()->json('Товар каталога успешно удален!', 200);
    }
}
