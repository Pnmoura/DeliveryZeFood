<?php

declare(strict_types=1);

namespace App\Establishments\Repository;

use Config\Conn;

class NewEstablishmentsRepository
{
    private $connection;
    
    public function __construct()
    {
        $this->connection = new Conn();
    }

    public function listAllNewEstablishments(): array
    {
        $connection = $this->connection->createDatabaseConnection();

        $queryBuilder = $connection->createQueryBuilder();
        $queryBuilder
            ->select(['*'])
            ->from('estabilishment');

        $query = $queryBuilder->getSQL();
        $result = $connection->executeQuery($query)->fetchAllAssociative();

        return $result;
    }

    public function registerNewEstablishments(array $data): int
    {
        $connection = $this->connection->createDatabaseConnection();
        $connection
            ->insert('estabilishment', $data);

        return (int)$connection->lastInsertId();
    }
}
