<?php

declare(strict_types=1);

namespace App\Establishments\Controller;

use App\Establishments\Application\Input\InputSaveEstabilishment;
use App\Establishments\Service\NewEstablishmentsService;
use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class NewEstablishmentsController extends NewEstablishmentsService
{
    public function allEstablishments(Request $request, Response $response)
    {
        $display = new NewEstablishmentsService();
        $listAll = $display->listAllEstablishments();

        $response->getBody()->write(
            json_encode($listAll)
        );

        return $response->withHeader('Content-Type', 'application/json');
    }

    public function inputNewEstablishment(Request $request, Response $response)
    {
        $body = json_decode($request->getBody()->getContents(), true);

        $name = $body['name'];
        $corporate_name = $body['corporate_name'];
        $cnpj = $body['cnpj'];
        $public_place = $body['public_place'];
        $number = $body['number'];
        $neighborhoods = $body['neighborhoods'];
        $city = $body['city'];
        $state = $body['state'];
        $uf = $body['uf'];
        $establishment_category_id = $body['establishment_category_id'];

        $establishmentService = new NewEstablishmentsService();
        $id = $establishmentService->registerNewEstablishment(
            new InputSaveEstabilishment(
                $name,
                $corporate_name,
                $cnpj,
                $public_place,
                $number,
                $neighborhoods,
                $city,
                $state,
                $uf,
                $establishment_category_id
            )
        );

        return new JsonResponse(
            [$id],
            200, [],
            JsonResponse::DEFAULT_JSON_FLAGS
        );
    }
}
