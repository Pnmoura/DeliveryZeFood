<?php

declare(strict_types=1);

namespace App\Products\Service;

use App\Products\Repository\ProductsRepository;
use PHPUnit\Framework\TestCase;

class ProductsListRepositoryTest extends TestCase
{

    public function testListProducts(): void
    {
        $productsRepository = new ProductsRepository();

        $result = $productsRepository->products();
        $this->assertNotEquals([], $result);
    }
}
