<?php

declare(strict_types=1);

namespace App\Establishments\Controller;

use App\Establishments\Service\EstablishmentTypeService;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class EstablishmentTypeController extends EstablishmentTypeService
{
    public function displayEstablishment(Request $request, Response $response): Response
    {
        $display = new EstablishmentTypeService();
        $list = $display->displayEstablishmentTypes();

        $response->getBody()->write(
            json_encode($list)
        );

        return $response->withHeader('Content-Type', 'application/json');
    }
}