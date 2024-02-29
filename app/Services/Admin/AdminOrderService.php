<?php

namespace App\Services\Admin;

use App\Models\OrderItem;

class AdminOrderService
{
    //Просмотр выполнненых заказов
    public function showOrder()
    {
        return OrderItem::all();
    }
}
