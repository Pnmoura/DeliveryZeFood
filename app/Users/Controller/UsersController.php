<?php

declare(strict_types=1);

namespace App\Users\Controller;

use Doctrine\DBAL\DriverManager;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class UsersController
{

    public function listUsers(Request $request, Response $response)
    {
        $conn = DriverManager::getConnection([
            'host' => 'localhost:3306',
            'user' => 'root',
            'password' => 'Cd4kzEeZuFBDdyo',
            'dbname' => 'delivery-ze-food',
            'driver' => 'pdo_mysql'
        ]);

        $usuarios = $conn->query('select * from users')->fetchAllAssociative();

        $data = [];
        foreach ($usuarios as $usuario) {
            $data = [
                'id' => $usuario['id'],
                'fullname' => $usuario['fullname'],
            ];
        }

        $response->getBody()->write(json_encode($data));
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function getEntityManager(): DriverManager
    {
        return DriverManager::getConnection([
                'host' => 'localhost:3306',
                'user' => 'root',
                'password' => 'Cd4kzEeZuFBDdyo',
                'dbname' => 'delivery-ze-food',
                'driver' => 'pdo_mysql'
        ]);
    }
}