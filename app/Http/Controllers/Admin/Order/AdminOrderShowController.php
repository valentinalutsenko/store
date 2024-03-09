<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Services\Admin\AdminOrderService;

class AdminOrderShowController extends Controller
{
    public function __construct(private AdminOrderService $adminOrderService)
    {
        $this->adminOrderService = $adminOrderService;
    }
    public function show(): OrderResponse
    {
        $order = $this->adminOrderService->showOrder();
        return new OrderResponse($order);
    }
}
