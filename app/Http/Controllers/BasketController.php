<?php

namespace App\Http\Controllers;

use App\Http\Requests\Basket\BasketFormRequest;
use App\Services\Basket\BasketService;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function __construct(private BasketService $basketService)
    {
        $this->basketService = $basketService;
    }

    public function store(BasketFormRequest $request): object
    {
        return $this->basketService->saveOrder($request);
    }
}
