<?php

namespace App\Services\Admin\Product;

use App\DTO\Product\ProductData;
use App\Models\Category\Category;
use App\Models\Product\Product;

class AdminProductService
{
    /**
     * @return array
     */
    public function getAllProduct(): array
    {
        return Product::paginate(10);
    }

    /**
     * @param ProductData $data
     * @return Product
     */
    public function createProduct(ProductData $data): Product
    {
        return Product::create($data);
    }

    /**
     * @param ProductData $data
     * @param int $categoryId
     * @param Product $product
     * @param int $productId
     * @return Product
     */
    public function editProduct(
        ProductData $data,
        int $categoryId,
        Product $product,
        int $productId): Product
    {
        if ($categoryId) {
            $category = Category::findOrFail($categoryId);
            $product->category()->associate($category);
        }
        $updateProduct = Product::findOrFail($productId);
        $updateProduct->fill([
            $updateProduct->title = $data->title,
            $updateProduct->price = $data->price,
            $updateProduct->description = $data->description,
            $updateProduct->count = $data->count,
            $updateProduct->category_id = $data->category_id,
        ]);
        $updateProduct->save();

        return $updateProduct;
    }

    /**
     * @param int $id
     * @return bool
     */
    public function deleteProduct(int $id): bool
    {
        if ($id) {
            Product::findOrFail($id)->delete();
        }

        return true; //Что должен возвращать метод в таком случае? Ничего нагуглить не смогла)))
    }
}
