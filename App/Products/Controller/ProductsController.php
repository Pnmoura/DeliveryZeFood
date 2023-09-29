<?php

declare(strict_types=1);

namespace App\Products\Controller;

use App\Products\Application\Input\InputSaveProducts;
use App\Products\Service\ProductsService;
use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class ProductsController extends ProductsService
{
    public function productsList(Request $request, Response $response)
    {
        $listingProducts = new ProductsService();
        $listing = $listingProducts->listProducts();

        $response->getBody()->write(
            json_encode($listing)
        );

        return $response->withHeader('Content-Type', 'application/json');
    }

    public function inputNewProduct(Request $request, Response $response)
    {
        $body = json_decode($request->getBody()->getContents(), true);

        $name = $body['name'];
        $description = $body['description'];
        $brand = $body['brand'];
        $value = $body['value'];
        $products_category = $body['products_category'];

        $productService = new ProductsService();
        $id = $productService->newProduct(
            new InputSaveProducts(
                $name,
                $description,
                $brand,
                $value,
                $products_category,
            )
        );

        return new JsonResponse(
          [$id],
          200, [],
          JsonResponse::DEFAULT_JSON_FLAGS
        );
    }
}
