<?php

use App\Users\Controller\UsersController;
use Slim\Factory\AppFactory;


$app = AppFactory::create();
$app->get('/users', [UsersController::class, 'listUsers'] );
$app->post('/create', [UsersController::class, 'insertRegister'] );
$app->run();
