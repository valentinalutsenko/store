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
            'product_id' => new ProductResource($this->product_id),
            'user_id' => new UserResource($this->user_id),
        ];
    }
}
