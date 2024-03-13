<?php

namespace App\Services\Basket;

use App\Models\Basket\Basket;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BasketService
{
    //Добавляем товар в корзину
    public function addBasket(Request $request): JsonResponse
    {
        $basket_id = $request->cookie('basket_id');
        $quantity = $request->query('quantity') ?? 1;

        if (empty($basket_id)) {
            //Если корзины не сущесвует - создаем объект корзины
            $basket = Basket::create();
            $basket_id = $basket->id; //получаем идентификатор, чтобы записать в cookie
        } else {
            // Если корзина уже существует, получаем объект корзины
            $basket = Basket::find($basket_id);
            // обновляем поле updated_at таблицы baskets
            $basket->touch();
        }

        if ($basket->products->contains($request)) {
            // если такой товар есть в корзине — изменяем кол-во
            $pivotRow = $basket->products->where('product_id', $request->id)->first()->pivot;
            $quantity = $pivotRow->quantity + $quantity;
            $pivotRow->update(['quantity' => $quantity]);
        } else {
            $basket->products()->attach($request->id, ['quantity' => $quantity]);
        }

        return response()->json('Заказ успешно добавлен в корзину!', 200);
    }
}
