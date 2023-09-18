<?php

use App\Users\Controller\InsertController;
use App\Users\Service\UserService;
use Slim\Factory\AppFactory;


$app = AppFactory::create();
$app->get('/users', [UserService::class, 'listUsers'] );
$app->post('/create', [InsertController::class, 'insertingUsers'] );
$app->run();
