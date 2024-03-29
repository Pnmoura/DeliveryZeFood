<?php

declare(strict_types=1);

namespace App\Users\Controller;

use App\Users\Application\Input\InputSaveCustomer;
use App\Users\Service\UserService;
use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class UsersController extends UserService
{
    public function show(Request $request, Response $response): Response
    {
        $connection = new UserService();
        $list = $connection->list();

        $response->getBody()->write(
            json_encode($list)
        );

        return $response->withHeader('Content-Type', 'application/json');
    }

    public function create(Request $request, Response $response)
    {
        $body = json_decode($request->getBody()->getContents(), true);

        $name = $body['name'];
        $cpf = $body['cpf'];
        $birthdate = $body['birthdate'];
        $telephone = $body['telephone'];
        $address = $body['address'];
        $number = $body['number'];
        $complement = $body['complement'];

        $userService = new UserService();
        $id = $userService->insertUsersService(
            new InputSaveCustomer(
                $name,
                $cpf,
                $birthdate,
                $telephone,
                $address,
                $number,
                $complement
            )
        );

        return new JsonResponse(
            [$id],
            200, [],
            JsonResponse::DEFAULT_JSON_FLAGS
        );
    }

}
