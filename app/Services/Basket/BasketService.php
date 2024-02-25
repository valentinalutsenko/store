<?php

namespace App\Services\Basket;

use App\Http\Requests\Basket\BasketFormRequest;
use App\Models\Basket;
use App\Models\Order;

class BasketService
{
    //Сохранение заказа в БД
    public function saveOrder(BasketFormRequest $request)
    {
        if (!$request->validated()) {
            return response()->json('Упс, что то пошло не так :(', 400);
        }

        //сохраняем заказ после успешной валидации
        $basket = Basket::getBasket();
        $user_id = auth()->check() ? $request->user()->id : null;
        $order = Order::create(
            $request->all() + ['amount' => $basket->getAmount(), 'user_id' => $user_id]
        );

        foreach ($basket->products as $product) {
            $order->items()->create([
                'product_id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $product->pivot->quantity,
                'cost' => $product->price * $product->pivot->quantity,
            ]);
            //очищаем корзину
            $basket->delete();

            return response()->json('Заказ успешно оформлен!', 200);
        }
    }
}
