<?php

use App\Users\Controller\UsersController;
use Slim\Factory\AppFactory;


$app = AppFactory::create();
$app->addErrorMiddleware(
    true,false,false
)->setDefaultErrorHandler(function ($request, $exception, $displayErrorDetails)
    use ($app) {
        $statusCode = $exception->getCode() ?: 500;
        $errorMessage = $exception->getMessage()
            ?: 'Erro interno do servidor';
        $response = $app->getResponseFactory()->createResponse($statusCode);
        $response->getBody()->write(json_encode(['error' => $errorMessage]));
        return $response->withHeader('Content-Type', 'application/json');
    });
$app->get('/users', [UsersController::class, 'show'] );
$app->post('/create', [UsersController::class, 'newUser'] );
$app->run();
