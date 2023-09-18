<?php

declare(strict_types=1);

namespace App\Users\Controller;

use App\Users\Service\UserService;
use Config\Conn;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../../../', '.env');
$dotenv->load();

class UsersController extends UserService
{
    private $conn;
    public function __construct()
    {
        $this->conn = new Conn();
    }

    public function listRegisters(): array
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
