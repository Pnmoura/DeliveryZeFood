<?php

declare(strict_types=1);

namespace App\Products\Controller;

use App\Products\Application\Input\InputSaveCategoryProducts;
use App\Products\Service\ProductsCategoryService;
use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class ProductsCategoryController extends ProductsCategoryService
{
    public function productsCategories(Request $request, Response $response)
    {
        $displayCategories = new ProductsCategoryService();
        $list = $displayCategories->listCategoriesProducts();

        $response->getBody()->write(
            json_encode($list)
        );

        return $response->withHeader('Content-Type', 'application/json');
    }

    public function inputNewProductsCategories(Request $request, Response $response)
    {
        $body =  json_decode($request->getBody()->getContents(), true);

        $name = $body['name'];

        $prodCategorieService = new ProductsCategoryService();
        $id = $prodCategorieService->newCategoryProducts(
            new InputSaveCategoryProducts(
                $name
            )
        );

        return new JsonResponse(
          [$id],
          200, [],
          JsonResponse::DEFAULT_JSON_FLAGS
        );
    }
}
