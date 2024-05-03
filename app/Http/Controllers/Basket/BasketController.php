<?php

namespace App\Http\Controllers\Basket;

use App\Http\Controllers\Controller;
use App\Http\Resources\Basket\BasketResource;
use App\Services\Basket\BasketService;

class BasketController extends Controller
{
    /**
     * @param BasketService $basketService
     */
    public function __construct(private BasketService $basketService)
    {
        $this->basketService = $basketService;
    }

    /**
     * @param int $productId
     * @return BasketResource
     */
    public function store(int $productId): BasketResource
    {
        $basket = $this->basketService->addBasket($productId);

        return new BasketResource($basket);
    }

    /**
     * @param int $id
     * @return BasketResource
     */
    public function destroy(int $id): BasketResource
    {
        $basket = $this->basketService->remove($id);

        return new BasketResource($basket);
    }
}
