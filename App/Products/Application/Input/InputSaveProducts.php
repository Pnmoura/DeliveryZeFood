<?php

declare(strict_types=1);

namespace App\Products\Application\Input;

class InputSaveProducts
{
    private $name;
    private $description;
    private $brand;
    private $value;
    private $products_category;

    public function __construct(
        string $name,
        string $description,
        string $brand,
        int $value,
        int $products_category
    )
    {
        $this->name = $name;
        $this->description = $description;
        $this->brand = $brand;
        $this->value = $value;
        $this->products_category = $products_category;
    }

    public function getName(): string
    {
        return $this->name;
    }
    public function getDescription(): string
    {
        return $this->description;
    }
    public function getBrand(): string
    {
        return $this->brand;
    }
    public function getValue(): int
    {
        return $this->value;
    }
    public function getProductsCategory(): int
    {
        return $this->products_category;
    }
}
