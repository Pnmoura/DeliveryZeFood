<?php

declare(strict_types=1);

namespace App\Products\Service;

use App\Products\Application\Input\InputSaveProducts;
use App\Products\Repository\ProductsRepository;

class ProductsService
{

    private $productsRepository;

    public function __construct()
    {
        $this->productsRepository = new ProductsRepository();
    }

    public function listProducts(): array
    {
        return $this->productsRepository->products();
    }

    public function newProduct(InputSaveProducts $inputSaveProducts): int
    {
        $data = [
            'name' => $inputSaveProducts->getName(),
            'description' => $inputSaveProducts->getDescription(),
            'brand' => $inputSaveProducts->getBrand(),
            'value' => $inputSaveProducts->getValue(),
            'products_category' => $inputSaveProducts->getProductsCategory()
        ];

        return $this->productsRepository->newProduct($data);
    }
}
