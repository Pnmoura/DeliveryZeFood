<?php

declare(strict_types=1);

use App\Establishments\Controller\EstablishmentCategoryController;
use App\Establishments\Controller\NewEstablishmentsController;
use App\Products\Controller\ProductsCategoryController;
use App\Products\Controller\ProductsController;
use App\Users\Controller\UsersController;
use Slim\Factory\AppFactory;

class AppRoutes
{
    public static function setupRoutes()
    {
        $app = AppFactory::create();
        $app->addErrorMiddleware(
            true, false, false
        )->setDefaultErrorHandler(function ($request, $exception, $displayErrorDetails)
        use ($app) {
            $statusCode = $exception->getCode() ?: 500;
            $errorMessage = $exception->getMessage()
                ?: 'Erro interno do servidor';
            $response = $app->getResponseFactory()->createResponse($statusCode);
            $response->getBody()->write(json_encode(['error' => $errorMessage]));
            return $response->withHeader('Content-Type', 'application/json');
        });

        // Rotas
        $app->get('/users', [UsersController::class, 'show']);
        $app->post('/create', [UsersController::class, 'create']);
        $app->get('/establishmentCategories', [EstablishmentCategoryController::class, 'displayEstablishment']);
        $app->get('/establishments', [NewEstablishmentsController::class, 'allEstablishments']);
        $app->post('/createdestablishments', [NewEstablishmentsController::class, 'inputNewEstablishment']);
        $app->get('/productsCategory', [ProductsCategoryController::class, 'productsCategories']);
        $app->post('/newCategoryProducts', [ProductsCategoryController::class, 'inputNewProductsCategories']);
        $app->get('/productslist', [ProductsController::class, 'productsList']);
        $app->post('/newProducts', [ProductsController::class, 'inputNewProduct']);

        $app->run();
    }
}

AppRoutes::setupRoutes();
