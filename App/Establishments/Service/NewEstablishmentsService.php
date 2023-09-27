<?php

declare(strict_types=1);

namespace App\Establishments\Service;

use App\Establishments\Application\Input\InputSaveEstabilishment;
use App\Establishments\Repository\NewEstablishmentsRepository;

class NewEstablishmentsService
{
    private $newEstablishmentsRepository;

    public function __construct()
    {
        $this->newEstablishmentsRepository = new NewEstablishmentsRepository();
    }

    public function listAllEstablishments(): array
    {
        return $this->newEstablishmentsRepository->listAllNewEstablishments();
    }

    public function registerNewEstablishment(InputSaveEstabilishment $inputSaveEstabilishment): int
    {
        $data = [
            'name' => $inputSaveEstabilishment->getName(),
            'corporate_name' => $inputSaveEstabilishment->getCorporateName(),
            'cnpj' => $inputSaveEstabilishment->getCnpj(),
            'public_place' => $inputSaveEstabilishment->getPublicPlace(),
            'number' => $inputSaveEstabilishment->getNumber(),
            'neighborhoods' => $inputSaveEstabilishment->getNeighborhoods(),
            'city' => $inputSaveEstabilishment->getCity(),
            'state' => $inputSaveEstabilishment->getState(),
            'uf' => $inputSaveEstabilishment->getUf(),
            'estabilishment_type_id' => $inputSaveEstabilishment->getEstablishmentCategoryId()
        ];

        return $this->newEstablishmentsRepository->registerNewEstablishments($data);
    }
}
