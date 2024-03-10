<?php

namespace App\Services\Basket;

use App\Models\Basket\Basket;
use App\Models\Order\Order;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class OrderService
{
    public function saveOrder($data): JsonResponse
    {
        //Если валидация пройдена успешно, сохраняем заказ в бд
        $basket = new Basket();
        $basket->getBasket();
        $user_id = Auth::check() ? Auth::id(): null;

        $order = Order::create(
            $data->all() + ['amount' => $basket->getAmount(), 'user_id' => $user_id]
        );
        $items = [];
        foreach ($basket->products as $product) {
            $items[] = [
                'product_id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $product->pivot->quantity,
                'cost' => $product->price * $product->pivot->quantity,
            ];
        }
        $order->items()->insert($items);
        //очищаем корзину после оформления заказа
        $basket->delete();
        return response()->json('Заказ успешно оформлен!', 200);
    }
}

