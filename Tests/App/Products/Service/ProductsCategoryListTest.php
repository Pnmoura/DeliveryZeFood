<?php

declare(strict_types=1);

namespace App\Products\Service;

use App\Products\Repository\ProductsCategoryRepository;
use PHPUnit\Framework\TestCase;

class ProductsCategoryListTest extends TestCase
{
    public function testListCategoriesProducts(): void
    {

        $categoryProductsRepository = new ProductsCategoryRepository();

        $result = $categoryProductsRepository->productsCategoryList();
        $this->assertNotEquals([], $result);
    }
}
