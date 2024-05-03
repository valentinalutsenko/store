<?php

namespace App\DTO\Product;

use Spatie\LaravelData\Data;

class ProductData extends Data
{
    /**
     * @param int $id
     * @param string $title
     * @param int $price
     * @param string|Optional $description
     * @param string|Optional $image
     * @param int $count
     * @param int $category_id
     */
    public function __construct(
        public int $id,
        public string $title,
        public int $price,
        public string|Optional $description,
        public string|Optional $image,
        public int $count,
        public int $category_id,
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->price = $price;
        $this->description = $description;
        $this->image = $image;
        $this->count = $count;
        $this->category_id = $category_id;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @return string|null
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }

    /**
     * @return int
     */
    public function getCategoryId(): int
    {
        return $this->category_id;
    }

    /**
     * @param string $title
     * @return void
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @param int $price
     * @return void
     */
    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

    /**
     * @param string|null $description
     * @return void
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @param string|null $image
     * @return void
     */
    public function setImage(?string $image): void
    {
        $this->image = $image;
    }

    /**
     * @param int $count
     * @return void
     */
    public function setCount(int $count): void
    {
        $this->count = $count;
    }

    /**
     * @param int $category_id
     * @return void
     */
    public function setCategoryId(int $category_id): void
    {
        $this->category_id = $category_id;
    }

    /**
     * @param int $id
     * @return void
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }
}
