<?php

declare(strict_types=1);

namespace App\Users\Service;

use App\Users\Controller\Input\InputSaveCustomer;
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

    public function insertService(InputSaveCustomer $inputSaveCustomer): int
    {
        $conn = $this->conn->createDatabaseConnection();
        $conn
            ->insert('users', [
                'fullname' => $inputSaveCustomer->getName(),
                'cpf' => $inputSaveCustomer->getCpf(),
                'birthdate' => $inputSaveCustomer->getBirthdate(),
                'telephone' => $inputSaveCustomer->getTelephone(),
                'address' => $inputSaveCustomer->getAddress()
            ]);

        return (int)$conn->lastInsertId();
    }
}
