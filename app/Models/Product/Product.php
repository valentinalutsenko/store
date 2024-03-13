<?php

namespace App\Models\Product;

use App\Models\Basket\Basket;
use App\Models\Category\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'image',
        'category_id',
        'count',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function baskets(): BelongsToMany
    {
        return $this->belongsToMany(Basket::class)->withPivot('quantity');
    }
}
