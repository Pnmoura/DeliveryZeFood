<?php

declare(strict_types=1);

namespace App\Users\Service;

use Config\Conn;

class UserService
{
    private $conn;
    public function __construct()
    {
        $this->conn = new Conn();
    }
    public function listUsers(): array
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
}
