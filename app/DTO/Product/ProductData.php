<?php

namespace App\DTO\Product;

use Spatie\LaravelData\Data;

class ProductData extends Data
{
    public function __construct(
        public string $title,
        public int $price,
        public ?string $description,
        public ?string $image,
        public int $count,
        public int $category_id,
    ) {
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function getCount(): int
    {
        return $this->count;
    }

    public function getCategoryId(): int
    {
        return $this->category_id;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function setImage(?string $image): void
    {
        $this->image = $image;
    }

    public function setCount(int $count): void
    {
        $this->count = $count;
    }

    public function setCategoryId(int $category_id): void
    {
        $this->category_id = $category_id;
    }
}
