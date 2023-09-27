<?php

declare(strict_types=1);

namespace App\Establishments\Controller;

use App\Establishments\Service\EstablishmentCategoryService;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class EstablishmentCategoryController extends EstablishmentCategoryService
{
    public function displayEstablishment(Request $request, Response $response): Response
    {
        $display = new EstablishmentCategoryService();
        $list = $display->displayEstablishmentCategories();

        $response->getBody()->write(
            json_encode($list)
        );

        return $response->withHeader('Content-Type', 'application/json');
    }
}
