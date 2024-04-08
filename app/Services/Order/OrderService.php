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
     * @return array
     */
    public function createOrder(OrderData $data): array
    {
        $basket = new Basket();

        if (! $basket->isEmpty()) {
            $order = Order::create([

                'name' => $data->name,
                'email' => $data->email,
                'phone' => $data->phone,
                'address' => $data->address,
                'amount' => $basket->getAmount(),
                'user_id' => 26,
            ]);

            foreach ($basket->get() as $product) {
                OrderProduct::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $product->quantity,
                ]);
            }
        }

        return $basket->clear();
    }
}
