<?php

declare(strict_types=1);

namespace App\Users\Controller;

use Pnmoura\Deliveryzefood\AllRegisters\ConnectionDatabase;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class UsersController extends ConnectionDatabase
{
    public function listUsers(Request $request, Response $response)
    {
        $connection = new ConnectionDatabase();
        $list = $connection->listRegisters();

        $response->getBody()->write(
            json_encode($list)
        );

        return $response->withHeader('Content-Type', 'application/json');
    }

}
