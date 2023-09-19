<?php

use App\Users\Controller\UsersController;
use Slim\Factory\AppFactory;


$app = AppFactory::create();
$app->get('/users', [UsersController::class, 'listRegisters'] );
$app->post('/create', [UsersController::class, 'newUser'] );
# $app->post('/create', [InsertController::class, 'insertingUsers'] );
$app->run();
