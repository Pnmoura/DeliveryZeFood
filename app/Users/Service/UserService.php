<?php

declare(strict_types=1);

namespace App\Users\Service;

use Config\Conn;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

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

    public function insertService(Request $request, Response $response): string
    {
        $conn = $this->conn->createDatabaseConnection();

        $body = json_decode($request->getBody()->getContents(), true);

        $name = $body['name'];
        $cpf = $body['cpf'];
        $birthdate = $body['birthdate'];
        $telephone = $body['telephone'];
        $address = $body['address'];

        $conn
            ->insert('users', [
                'fullname' => $name,
                'cpf' => $cpf,
                'birthdate' => $birthdate,
                'telephone' => $telephone,
                'address' => $address
            ]);

        $conn->lastInsertId();

        return $response->withHeader('Content-Type', 'application/json');
    }
}
