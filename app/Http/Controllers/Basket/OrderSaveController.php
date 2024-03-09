<?php

namespace App\Http\Controllers\Basket;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\OrderFormRequest;
use App\Services\Basket\OrderService;

class OrderSaveController extends Controller
{
    public function __construct(private OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function store(OrderFormRequest $request): OrderResponse
    {
        $data = $request->validated();
        $order = $this->orderService->saveOrder($data);
        return new OrderResponse($order);
    }
}
