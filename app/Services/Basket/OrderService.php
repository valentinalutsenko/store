<?php

namespace App\Services\Basket;

use App\Http\Requests\Order\OrderFormRequest;
use App\Models\Basket;
use App\Models\Order;
use Illuminate\Http\JsonResponse;

class OrderService
{
    public function saveOrder(OrderFormRequest $request): JsonResponse
    {
        $request->validated();
        //Если валидация пройдена успешно, сохраняем заказ в бд
        $basket = new Basket();
        $basket->getBasket();
        $user_id = auth()->check() ? auth()->user()->id: null;

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
        }
        //очищаем корзину после оформления заказа
        $basket->delete();
        return response()->json('Заказ успешно оформлен!', 200);
    }
}

