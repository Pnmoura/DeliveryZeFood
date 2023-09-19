<?php

declare(strict_types=1);

namespace App\Users\Controller;

use App\Users\Service\UserService;
use Dotenv\Dotenv;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../../../', '.env');
$dotenv->load();

class UsersController extends UserService
{
    public function listRegisters(Request $request, Response $response): Response
    {

        $connection = new UserService();
        $list = $connection->listUsers();

        $response->getBody()->write(
            json_encode($list)
        );

        return $response->withHeader('Content-Type', 'application/json');
    }

}
