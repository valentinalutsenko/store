<?php

namespace App\Services\Admin\Product;

use App\DTO\Product\ProductData;
use App\Models\Category\Category;
use App\Models\Product\Product;

class AdminProductService
{

    /**
     * @param int $count
     * @return array
     */
    public function getAllProduct(int $count): array
    {
        return Product::paginate($count);
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
     * @param Product $product
     * @return Product
     */
    public function editProduct(
        ProductData $data,
        Product $product,
    ): Product {
        if ($data->category_id) {
            $category = Category::findOrFail($data->category_id);
            $product->category()->associate($category);
        }
        $updateProduct = Product::findOrFail($product->id);
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
        return Product::where('id', $id)->delete();
    }
}
