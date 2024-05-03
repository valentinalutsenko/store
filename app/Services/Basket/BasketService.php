<?php

namespace App\Services\Basket;

use App\Models\Basket\Basket;
use App\Models\Product\Product;

class BasketService
{
    //Добавляем товар в корзину

    /**
     * @param $productId
     * @return array
     */
    public function addBasket($productId): array
    {
        $product = Product::findOrFail($productId);

        $basket = Basket::where(['product_id' => $product->id, 'user_id' => auth()->user()?->id])->first();

        if ($basket) {
            $basket->quantity++;
            $basket->save();
        } else {
            $basket = Basket::create([
                'quantity' => 1,
                'price' => $product->price,
                'product_id' => $product->id,
                'user_id' => auth()->user()?->id,
            ]);
        }
        $basket->products()->attach($product->id);

        return $basket;
    }

    /**
     * @return int
     */
    public function remove($id)
    {
        return Basket::destroy($id);
    }
}
