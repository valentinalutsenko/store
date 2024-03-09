<?php

namespace App\Models\Basket;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Cookie;

class Basket extends Model
{
    use HasFactory;

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }

    //Расчитывает стоимость корзины
    public function getAmount(): float
    {
        $amount = 0.0;
        foreach ($this->products as $product) {
            $amount = $amount + $product->price * $product->pivot->quantity;
        }
        return $amount;
    }
    // Возвращает объект корзины, если не найден — создает новый
    public function getBasket()
    {
        $basket_id = request()->cookie('basket_id');
        if(!empty($basket_id)) {
            $this->basket = Basket::find($basket_id);
        } else {
            $this->basket = Basket::create();
        }
        Cookie::queue('basket_id', $this->basket->id);
    }

}
