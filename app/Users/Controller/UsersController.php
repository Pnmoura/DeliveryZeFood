<?php

declare(strict_types=1);

namespace App\Users\Controller;

use Pnmoura\Deliveryzefood\ListUsers\ListUsers;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class UsersController extends ListUsers
{
    public function listUsers(Request $request, Response $response)
    {
        $connection = new ListUsers();
        $list = $connection->listRegisters();

        $response->getBody()->write(
            json_encode($list)
        );

        return $response->withHeader('Content-Type', 'application/json');
    }

}
