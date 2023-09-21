<?php

declare(strict_types=1);

namespace App\Users\Repository;

use Config\Conn;

class UserRepository
{
    private $conn;

    public function __construct()
    {
        $this->conn = new Conn();
    }

    public function listUsersService(): array
    {
        $conn = $this->conn->createDatabaseConnection();

        $queryBuilder = $conn->createQueryBuilder();
        $queryBuilder
            ->select(['*'])
            ->from('users');

        $query = $queryBuilder->getSQL();
        $result = $conn->executeQuery($query)->fetchAllAssociative();

        return $result;
    }

    public function insertService(array $data): int
    {
        $conn = $this->conn->createDatabaseConnection();
        $conn
            ->insert('users', $data);

        return (int)$conn->lastInsertId();
    }
}
