<?php

declare(strict_types=1);

namespace App\Users\Controller;

use App\Users\Controller\Input\InputSaveCustomer;
use App\Users\Service\UserService;
use Dotenv\Dotenv;
use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../../../', '.env');
$dotenv->load();

class UsersController extends UserService
{
    public function listRegisters(Request $request, Response $response): Response
    {
        $connection = new UserService();
        $list = $connection->showUsers();

        $response->getBody()->write(
            json_encode($list)
        );

        return $response->withHeader('Content-Type', 'application/json');
    }

    public function newUser(Request $request, Response $response)
    {
        $body = json_decode($request->getBody()->getContents(), true);

        $name = $body['name'];
        $cpf = $body['cpf'];
        $birthdate = $body['birthdate'];
        $telephone = $body['telephone'];
        $address = $body['address'];

        $userService = new UserService();
        $id = $userService->insertUsersService(
            new InputSaveCustomer(
                $name,
                $cpf,
                $birthdate,
                $telephone,
                $address
            )
        );

        return new JsonResponse(
            [$id],
            200, [],
            JsonResponse::DEFAULT_JSON_FLAGS
        );
    }

}
