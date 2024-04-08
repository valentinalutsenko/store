<?php

namespace App\Http\Controllers\Basket;

use App\Http\Controllers\Controller;
use App\Http\Resources\Basket\BasketResource;
use App\Services\Basket\BasketService;
use Illuminate\Http\Request;

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
     * @param Request $request
     * @return BasketResource
     */
    public function store(Request $request): BasketResource
    {
        $productId = $request->id;
        $basket = $this->basketService->addBasket($productId);

        return new BasketResource($basket);
    }

    /**
     * @param Request $request
     * @return BasketResource
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $basket = $this->basketService->remove($id);

        return new BasketResource($basket);
    }
}
