<?php

declare(strict_types=1);

namespace App\Establishments\Service;

use App\Establishments\Repository\EstablishmentRepository;

class EstablishmentTypeService
{
    private $estabilishmentRepository;
    
    public function __construct()
    {
        $this->estabilishmentRepository = new EstablishmentRepository();
    }

    public function displayEstablishmentTypes(): array
    {
        return $this->estabilishmentRepository->showEstablishmentType();
    }
}