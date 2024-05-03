<?php

namespace App\Services\Order;

use App\DTO\Order\OrderData;
use App\Models\Basket\Basket;
use App\Models\Order\Order;
use App\Models\OrderProduct\OrderProduct;

class OrderService
{
    /**
     * @param OrderData $data
     * @return bool
     */
    public function createOrder(OrderData $data): bool
    {
        $basket = new Basket();

        $order = Order::create([

            'name' => $data->name,
            'email' => $data->email,
            'phone' => $data->phone,
            'address' => $data->address,
            'amount' => $basket->getAmount(),
            'user_id' => auth()->user()?->id,
        ]);

        $newOrdersProduct = [];
        foreach ($basket->get() as $product) {
            $newOrdersProduct[] = [
                'order_id' => $order->id,
                'product_id' => $product->id,
                'quantity' => $product->quantity,
            ];
        }
        OrderProduct::insert($newOrdersProduct);

        return $basket->delete();
    }
}
