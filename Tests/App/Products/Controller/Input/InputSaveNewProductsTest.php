<?php

declare(strict_types=1);

namespace App\Products\Controller\Input;

use App\Products\Repository\ProductsRepository;
use PHPUnit\Framework\TestCase;

class InputSaveNewProductsTest extends TestCase
{
    public function testSaveNewProduct(): void
    {
        $registerNewProducts = new ProductsRepository();

        $mock = $registerNewProducts->newProduct([
            'name' => 'Arroz',
            'description' => 'Arroz Tio Joao',
            'brand' => 'Tio Joao',
            'value' => 15,
            'products_category' => 2
        ]);

        $this->assertIsInt($mock);
    }
}
