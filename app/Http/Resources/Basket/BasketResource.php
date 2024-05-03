<?php

namespace App\Http\Resources\Basket;

use App\Http\Resources\Product\ProductResource;
use Illuminate\Http\Resources\Json\JsonResource;

class BasketResource extends JsonResource
{
    /**
     * @param $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'quantity' => $this->quantity,
            'price' => $this->price,
            'user' => $this->relationLoaded('user') ? new ProductResource($this->user) : null,
        ];
    }
}
