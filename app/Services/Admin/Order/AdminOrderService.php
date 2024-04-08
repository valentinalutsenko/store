<?php

namespace App\Services\Admin\Order;

use App\Models\OrderProduct\OrderProduct;
use Illuminate\Database\Eloquent\Collection;

class AdminOrderService
{
    //Просмотр выполнненых заказов

    /**
     * @return Collection
     */
    public function showOrder(): Collection
    {
        return OrderProduct::paginate(10);
    }
}
