<?php

namespace App\Http\Resources\Order;

use App\Http\Resources\Product\ProductResource;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * @param $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'comment' => $this->comment,
            'amount' => $this->price,
            'product' => $this->relationLoaded('product') ? new ProductResource($this->product) : null,
            'user' => $this->relationLoaded('user') ? new ProductResource($this->user) : null,
        ];
    }
}
