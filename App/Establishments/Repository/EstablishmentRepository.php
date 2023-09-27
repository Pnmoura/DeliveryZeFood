<?php

declare(strict_types=1);

namespace App\Establishments\Repository;

use Config\Conn;

class EstablishmentRepository
{
    private $conn;

    public function __construct()
    {
        $this->conn = new Conn();
    }

    public function showEstablishmentCategory(): array
    {
        $conn = $this->conn->createDatabaseConnection();

        $queryBuilder = $conn->createQueryBuilder();
        $queryBuilder
            ->select(['*'])
            ->from('establishment_type');

        $query = $queryBuilder->getSQL();
        $result = $conn->executeQuery($query)->fetchAllAssociative();

        return $result;
    }
}
