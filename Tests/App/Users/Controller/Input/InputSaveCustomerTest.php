<?php

declare(strict_types=1);

namespace Tests\App\Users;

use App\Users\Repository\UserRepository;
use PHPUnit\Framework\TestCase;

class InputSaveCustomerTest extends TestCase
{
    public function testInsertService(): void
    {
        $insertService = new UserRepository();

        $result = $insertService->insertService([
            'fullname' => 'Usuario',
            'cpf' => '12345678901',
            'birthdate' => '2023-09-25',
            'telephone' => '11940028922',
            'address' => 'Rua Bonnard, 12',
        ]);

        $this->assertIsInt($result);
    }
}
