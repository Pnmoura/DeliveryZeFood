<?php

declare(strict_types=1);

namespace Pnmoura\Deliveryzefood\ListUsers;

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
            'host' => $_ENV['DB_HOST'],
            'user' => $_ENV['DB_USERNAME'],
            'password' => $_ENV['DB_PASSWORD'],
            'dbname' => $_ENV['DB_DATABASE'],
            'driver' => $_ENV['DB_DRIVER'],
        ];

        return DriverManager::getConnection($connectionParams);
    }
}