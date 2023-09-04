<?php

namespace Pnmoura\Deliveryzefood\AllRegisters;

use Doctrine\DBAL\DriverManager;

class AllRegisters
{
    public function listRegisters(): array
    {
        $conn = DriverManager::getConnection([
            'host' => 'localhost:3306',
            'user' => 'root',
            'password' => 'Cd4kzEeZuFBDdyo',
            'dbname' => 'delivery-ze-food',
            'driver' => 'pdo_mysql'
        ]);

        $usuarios = $conn->query('select * from users')->fetchAllAssociative();
    }
}