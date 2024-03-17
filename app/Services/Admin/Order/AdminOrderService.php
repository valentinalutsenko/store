<?php

namespace App\Services\Admin\Order;

use App\Models\Order\OrderItem;

class AdminOrderService
{
    //Просмотр выполнненых заказов

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function showOrder()
    {
        return OrderItem::all();
    }
}
