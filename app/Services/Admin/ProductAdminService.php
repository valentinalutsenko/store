<?php

namespace App\Services\Admin;

use App\Models\Product;
use Illuminate\Support\Collection;

class ProductAdminService
{
    //Просмотр всех продуктов
    public function getAllProduct(): Collection
    {
        return Product::all();
    }

}
