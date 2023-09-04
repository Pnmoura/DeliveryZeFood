<?php

declare(strict_types=1);

namespace App\Users\Controller;

use Doctrine\DBAL\DriverManager;
use Laminas\Diactoros\Response\JsonResponse;
use Pnmoura\Deliveryzefood\AllRegisters\AllRegisters;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class UsersController
{

    public function listUsers(Request $request, Response $response)
    {
        $usuarios = [AllRegisters::class, 'listRegisters'];

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
}