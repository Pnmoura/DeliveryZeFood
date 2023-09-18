<?php

namespace Pnmoura\Deliveryzefood\InsertUsers;

use Pnmoura\Deliveryzefood\ListUsers\Conn;
use Psr\Http\Message\ResponseInterface as Response;
use Dotenv\Dotenv;
use Slim\Psr7\Request;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../../', '.env');
$dotenv->load();
class InsertUsers
{
    private $conn;

    public function __construct()
    {
        $this->conn = new Conn();
    }

    public function insertingUsers(Request $request, Response $response): Response
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