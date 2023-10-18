<?php

declare(strict_types=1);

namespace App\Authentication\Repository;

use Config\Conn;
class AuthenticationUserRepository
{
    private $connection;

    public function __construct()
    {
        $this->connection = new Conn();
    }

    public function dataUsers(): array
    {
        $connection = $this->connection->createDatabaseConnection();

        $queryBuilder = $connection->createQueryBuilder();
        $queryBuilder
            ->select(['email', 'senha'])
            ->from('users', 'u');

        $query = $queryBuilder->getSQL();
        $result = $connection->executeQuery($query)->fetchAllAssociative();

        return $result;
    }
}
