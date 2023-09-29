<?php

declare(strict_types=1);

namespace App\Products\Repository;

use Config\Conn;

class ProductsRepository
{
    private $connection;

    public function __construct()
    {
        $this->connection = new Conn();
    }

    public function products(): array
    {
        $connection = $this->connection->createDatabaseConnection();

        $products = $connection->createQueryBuilder();
        $products
            ->select(['*'])
            ->from('products');

        $query = $products->getSQL();
        $query = $connection->executeQuery($query)->fetchAllAssociative();

        return $query;
    }

    public function newProduct(array $data): int
    {
        $connection = $this->connection->createDatabaseConnection();
        $connection
            ->insert('products', $data);

        return (int)$connection->lastInsertId();

    }
}
