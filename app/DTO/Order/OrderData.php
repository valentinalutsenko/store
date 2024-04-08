<?php

namespace App\DTO\Order;

use Spatie\LaravelData\Data;

class OrderData extends Data
{
    /**
     * @param string $name
     * @param string $email
     * @param string|null $phone
     * @param string $address
     * @param int|null $amount
     */
    public function __construct(
        public string $name,
        public string $email,
        public ?string $phone,
        public string $address,
        public ?int $amount,
    ) {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->address = $address;
        $this->amount = $amount;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return int|null
     */
    public function getPhone(): ?int
    {
        return $this->phone;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $name
     * @return void
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param string $email
     * @return void
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @param int|null $phone
     * @return void
     */
    public function setPhone(?int $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @param string $address
     * @return void
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    /**
     * @param int|null $amount
     * @return void
     */
    public function setAmount(?int $amount): void
    {
        $this->amount = $amount;
    }
}
