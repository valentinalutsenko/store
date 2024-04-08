<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\OrderFormRequest;
use App\Http\Resources\Order\OrderResource;
use App\Services\Order\OrderService;

class OrderController extends Controller
{
    /**
     * @param OrderService $orderService
     */
    public function __construct(private OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    /**
     * @param OrderFormRequest $request
     * @return OrderResource
     */
    public function store(OrderFormRequest $request): OrderResource
    {
        $order = $this->orderService->createOrder($request->data());

        return new OrderResource($order);
    }
}
