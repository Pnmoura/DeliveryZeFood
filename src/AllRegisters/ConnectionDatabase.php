<?php

declare(strict_types=1);

namespace Pnmoura\Deliveryzefood\AllRegisters;

use Doctrine\DBAL\DriverManager;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../../', '.env');
$dotenv->load();

class ConnectionDatabase
{
    public function listRegisters(): array
    {
        $conn = $this->createDatabaseConnection();
        $query = "SELECT 
                        fullname as 'nome', 
                        cpf, 
                        birthdate as 'Data de Nasc.', 
                        telephone as 'Telefone', 
                        address as 'Endereço'    
                    FROM 
                        users";
        $result = $conn->executeQuery($query)->fetchAllAssociative();

        return $result;
    }

    private function createDatabaseConnection()
    {
        $connectionParams = [
            'host' => 'localhost:3306',
            'user' => 'root',
            'password' => 'Cd4kzEeZuFBDdyo',
            'dbname' => 'delivery-ze-food',
            'driver' => 'pdo_mysql',
        ];

        return DriverManager::getConnection($connectionParams);
    }
}
