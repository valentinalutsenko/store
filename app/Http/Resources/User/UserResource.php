<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * @param $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'login' => $this->login,
            'email' => $this->email,
            'email_verified_at' => $this->email_verified_at,
            'is_admin' => $this->is_admin,
            'password' => $this->password,
        ];
    }
}
