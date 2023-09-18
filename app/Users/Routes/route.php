<?php

use App\Users\Controller\UsersController;
use Pnmoura\Deliveryzefood\InsertUsers\InsertUsers;
use Slim\Factory\AppFactory;


$app = AppFactory::create();
$app->get('/users', [UsersController::class, 'listUsers'] );
$app->post('/create', [InsertUsers::class, 'insertingUsers'] );
$app->run();
