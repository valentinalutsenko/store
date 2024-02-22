<?php

namespace App\DTO\Product;

use App\Http\Resources\Product\ProductCollection;

class ProductDTO
{
    public function __construct(private ProductCollection $products)
    {
        $this->products = $products;
    }
    public function getProducts(): ProductCollection
    {
        return $this->products;
    }

    public function setProducts(ProductCollection $products): self
    {
        $this->products = $products;

        return $this;
    }

}
