<?php

namespace Tests\App\Establishments\Service;

use App\Establishments\Repository\EstablishmentRepository;
use PHPUnit\Framework\TestCase;

class EstablishmentRepositoryTest extends TestCase
{
    public function testShowEstablishmentRepository(): void
    {
        $EstablishmentRepository = new EstablishmentRepository();

        $result = $EstablishmentRepository->showEstablishmentType();
        $this->assertNotEquals([], $result);
    }

}