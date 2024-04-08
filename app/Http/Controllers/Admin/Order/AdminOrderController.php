<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
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
     * @return OrderResource
     */
    public function show(): OrderResource
    {
        $order = $this->adminOrderService->showOrder();

        return new OrderResource($order);
    }
}
