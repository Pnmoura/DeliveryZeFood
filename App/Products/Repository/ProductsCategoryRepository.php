<?php

declare(strict_types=1);

namespace App\Products\Repository;

use Config\Conn;

class ProductsCategoryRepository
{
    
    private $connection;
    
    public function __construct()
    {
        $this->connection = new Conn();
    }

    public function productsCategoryList(): array
    {
        $connection = $this->connection->createDatabaseConnection();

        $querySearch = $connection->createQueryBuilder();
        $querySearch
            ->select(['*'])
            ->from('products_category');

        $query = $querySearch->getSQL();
        $result = $connection->executeQuery($query)->fetchAllAssociative();

        return $result;
    }

    public function insertNewCategoryProducts(array $data): int
    {
        $connection = $this->connection->createDatabaseConnection();
        $connection
            ->insert('products_category', $data);

        return (int)$connection->lastInsertId();
    }
}
