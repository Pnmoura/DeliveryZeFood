<?php

declare(strict_types=1);

namespace App\Users\Service;

use App\Users\Controller\UsersController;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class UserService
{
    public function listUsers(Request $request, Response $response)
    {
        $connection = new UsersController();
        $list = $connection->listRegisters();

        $response->getBody()->write(
            json_encode($list)
        );

        return $response->withHeader('Content-Type', 'application/json');
    }
}
