<?php

namespace App\Http\Controllers\Basket;

use App\Http\Controllers\Controller;
use App\Http\Requests\Basket\BasketFormRequest;
use App\Services\Basket\BasketService;
use Illuminate\Http\JsonResponse;

class BasketController extends Controller
{
    public function __construct(private BasketService $basketService)
    {
        $this->basketService = $basketService;
    }

    public function store(BasketFormRequest $request): JsonResponse
    {
        return $this->basketService->saveOrder($request);
    }
}
