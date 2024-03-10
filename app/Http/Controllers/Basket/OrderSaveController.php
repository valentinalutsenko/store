<?php

namespace App\Http\Controllers\Basket;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\OrderFormRequest;
use App\Services\Basket\OrderService;
use Illuminate\Http\JsonResponse;

class OrderSaveController extends Controller
{
    public function __construct(private OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function store(OrderFormRequest $request): JsonResponse
    {
        $data = $request->validated();
        return $this->orderService->saveOrder($data);
    }
}
