<?php

use App\Users\Controller\UsersController;
use Slim\Factory\AppFactory;


$app = AppFactory::create();
$app->get('/users', [UsersController::class, 'listUsers'] );
$app->run();