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

        $queryBuilder = $conn->createQueryBuilder();
        $queryBuilder
            ->select(['*'])
            ->from('users');

        $query = $queryBuilder->getSQL();
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
