<?php

namespace Pnmoura\Deliveryzefood\InsertUsers;

use Pnmoura\Deliveryzefood\ListUsers\Conn;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../../', '.env');
$dotenv->load();
class InsertUsers
{
    private $conn;

    public function __construct()
    {
        $this->conn = new Conn();
    }

    public function insertingUsers()
    {
        $conn = $this->conn->createDatabaseConnection();

        $queryBuilderInsert = $conn->createQueryBuilder();
        $queryBuilderInsert
            ->insert('users')
            ->values(array(
                'fullname' => '?',
                'cpf' => '?',
                'birthdate' => '?',
                'telephone' => '?',
                'address' => '?'
            ));

        $query = $queryBuilderInsert->getSQL();
        $insert = $conn->executeQuery($query)->fetchAllAssociative();

        var_dump('Insert', $insert);
    }
}