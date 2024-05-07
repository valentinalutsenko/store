<?php

namespace App\Services\Admin\Order;

use App\DTO\Order\OrderData;
use App\Models\OrderProduct\OrderProduct;
use Illuminate\Database\Eloquent\Collection;

class AdminOrderService
{
    //Просмотр выполнненых заказов

    /**
     * @param int $count
     * @return Collection
     */
    public function showOrder(int $count): Collection
    {
        return OrderProduct::paginate($count);
    }
}
