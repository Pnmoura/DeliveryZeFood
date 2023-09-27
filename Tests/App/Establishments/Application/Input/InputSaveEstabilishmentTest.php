<?php

declare(strict_types=1);

namespace App\Establishments\Application\Input;

use App\Establishments\Repository\NewEstablishmentsRepository;
use PHPUnit\Framework\TestCase;

class InputSaveEstabilishmentTest extends TestCase
{
    public function testNewEstabilishment(): void
    {
        $registerEstabilishment = new NewEstablishmentsRepository();

        $register = $registerEstabilishment->registerNewEstablishments([
            'name' => 'Edson e Isabelle Comercio de Bebidas Ltda',
            'corporate_name' => 'Edson e Isabelle Comercio de Bebidas Ltda',
            'cnpj' => '96353142000101',
            'public_place' => 'Rua Jordina Maria',
            'number' => '114',
            'neighborhoods' => 'Progresso',
            'city' => 'Blumenau',
            'state' => 'Santa Catarina',
            'uf' => 'SC',
            'estabilishment_type_id' => '1',
        ]);

        $this->assertIsInt($register);
    }
}
