<?php

namespace App\Models\Basket;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * App\Models\Basket\Basket
 *
 *  @property int $id
 *  @property int $quantity
 *  @property int $price
 *  @property int $user_id
 *  @property int $product_id
 *  @property \Illuminate\Support\Carbon|null $created_at
 *  @property \Illuminate\Support\Carbon|null $updated_at
 *  @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product\Product> $products
 *  @property-read int|null $products_count
 *  @method static \Illuminate\Database\Eloquent\Builder|Basket newModelQuery()
 *  @method static \Illuminate\Database\Eloquent\Builder|Basket newQuery()
 *  @method static \Illuminate\Database\Eloquent\Builder|Basket query()
 *  @method static \Illuminate\Database\Eloquent\Builder|Basket whereCreatedAt($value)
 *  @method static \Illuminate\Database\Eloquent\Builder|Basket whereId($value)
 *  @method static \Illuminate\Database\Eloquent\Builder|Basket wherePrice($value)
 *  @method static \Illuminate\Database\Eloquent\Builder|Basket whereProductId($value)
 *  @method static \Illuminate\Database\Eloquent\Builder|Basket whereQuantity($value)
 *  @method static \Illuminate\Database\Eloquent\Builder|Basket whereUpdatedAt($value)
 *  @method static \Illuminate\Database\Eloquent\Builder|Basket whereUserId($value)
 */
class Basket extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'product_id',
        'basket_id',
        'user_id',
        'quantity',
        'price',
    ];

    /**
     * @return BelongsToMany
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'basket_product', 'basket_id', 'product_id');
    }

    //Расчитывает стоимость корзины

    /**
     * @return int
     */
    public function getAmount(): int
    {
        $amount = 0.0;
        foreach ($this->products as $product) {
            $amount = $amount + $product->price * $product->quantity;
        }

        return $amount;
    }
}
