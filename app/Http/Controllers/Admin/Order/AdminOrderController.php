<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\OrderRequest;
use App\Http\Resources\Order\OrderResource;
use App\Services\Admin\Order\AdminOrderService;

class AdminOrderController extends Controller
{
    /**
     * @param AdminOrderService $adminOrderService
     */
    public function __construct(private AdminOrderService $adminOrderService)
    {
        $this->adminOrderService = $adminOrderService;
    }


    /**
     * @param int $count
     * @return OrderResource
     */
    public function show(int $count): OrderResource
    {
        $order = $this->adminOrderService->showOrder($count);

        return new OrderResource($order);
    }
}
