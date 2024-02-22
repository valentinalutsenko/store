<?php

namespace App\Http\Controllers;

use App\Services\Basket\BasketService;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function __construct(private BasketService $basketService)
    {
        $this->basketService = $basketService;
    }

//    public function store(): object
//    {
//        return $this->basketService->;
//    }
}
