<?php

declare(strict_types=1);

namespace App\Establishments\Service;

use App\Establishments\Repository\EstablishmentRepository;

class EstablishmentCategoryService
{
    private $estabilishmentRepository;
    
    public function __construct()
    {
        $this->estabilishmentRepository = new EstablishmentRepository();
    }

    public function displayEstablishmentCategories(): array
    {
        return $this->estabilishmentRepository->showEstablishmentCategory();
    }
}
