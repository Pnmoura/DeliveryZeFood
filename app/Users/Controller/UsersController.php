<?php

namespace App\Users\Controller;

use Doctrine\ORM\EntityManager;
use http\Client\Curl\User;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
class UsersController
{
    private $entityManager;

    /**
     * @param $entityManager
     */
    public function __construct(EntityManager\ $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function listUsers(Request $request, Response $response, array $args)
    {
        $userRepository = $this->entityManager->getRepository(User::class);
        $user = $userRepository->findAll();
    }

    $data = [];
    foreach ($users as $user)
    {
    $data[] = [
        'id' => $user->getId(),
        'name' => $user->getName(),
        'email' => $user->getEmail(),// Adicione outros campos aqui conforme necessário
        ];
    }

    // Retorne a resposta em formato JSON (ou outro formato desejado)
    $response->getBody()->write(json_encode($data));
    return $response->withHeader('Content-Type', 'application/json');
}