<?php

declare(strict_types=1);

namespace App\Products\Controller\Input;

use App\Products\Repository\ProductsCategoryRepository;
use PHPUnit\Framework\TestCase;

class InputSaveNewCategoryProductsTest extends TestCase
{
    public function testInsertNewProductsCategory(): void
    {
        $productServiceNew = new ProductsCategoryRepository();

        $mock = $productServiceNew->insertNewCategoryProducts([
            'name' => 'Comercio',
        ]);

        $this->assertIsInt($mock);
    }
}
