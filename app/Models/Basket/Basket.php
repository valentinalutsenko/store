<?php

namespace App\Models\Basket;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Basket extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'user_id',
        'quantity',
        'price',
    ];

    /**
     * @return BelongsToMany
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }

    //Расчитывает стоимость корзины

    /**
     * @return int
     */
    public function getAmount(): int
    {
        $amount = 0.0;
        foreach ($this->products as $product) {
            $amount = $amount + $product->price * $product->pivot->quantity;
        }

        return $amount;
    }

    //Проверяет наличие товаров в корзине

    /**
     * @return bool
     */
    public function isEmpty(): bool
    {
        if (count($this->get()) > 0) {
            return false;
        }

        return true;
    }

    //Полностью очищает содержимое корзины покупателя

    /**
     * @return array
     */
    public function clear(): array
    {
        return $this->basket->delete();
    }
}
