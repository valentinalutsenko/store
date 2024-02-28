<?php

namespace App\Http\Controllers\Basket;

use App\Http\Controllers\Controller;
use App\Services\Basket\BasketService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BasketAddController extends Controller
{
    public function __construct(private BasketService $basketService)
    {
        $this->basketService = $basketService;
    }

    public function store(Request $request, $id): JsonResponse
    {
        return $this->basketService->addBasket($request, $id);
    }
}
