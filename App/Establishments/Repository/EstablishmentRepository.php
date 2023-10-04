<?php

declare(strict_types=1);

namespace App\Establishments\Repository;

use Config\Conn;
use Kernel\Configuration\Configuration;

class EstablishmentRepository
{
    private $conn;

    public function __construct()
    {
        $this->conn = new Configuration();
    }

    public function showEstablishmentCategory(): array
    {
        $conn = $this->conn->createDatabaseConnection();

        $queryBuilder = $conn->createQueryBuilder();
        $queryBuilder
            ->select(['*'])
            ->from('establishment_category');

        $query = $queryBuilder->getSQL();
        $result = $conn->executeQuery($query)->fetchAllAssociative();

        return $result;
    }
}
