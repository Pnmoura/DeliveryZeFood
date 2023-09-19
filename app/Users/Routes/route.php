<?php

use App\Users\Controller\InsertController;
use App\Users\Controller\UsersController;
use App\Users\Service\UserService;
use Slim\Factory\AppFactory;


$app = AppFactory::create();
$app->get('/users', [UsersController::class, 'listRegisters'] );
$app->post('/create', [InsertController::class, 'insertingUsers'] );
$app->run();
