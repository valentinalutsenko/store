<?php

namespace App\Http\Resources\Basket;

use App\Http\Resources\Product\ProductResource;
use App\Http\Resources\User\UserResource;
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
            'product_id' => new ProductResource($this->product_id),
            'user_id' => new UserResource($this->user_id),
        ];
    }
}
