<?php

declare(strict_types=1);

namespace App\Establishments\Application\Input;

class InputSaveEstabilishment
{
    private $name;

    private $corporate_name;

    private $cnpj;

    private $public_place;

    private $number;

    private $neighborhoods;

    private $city;

    private $state;

    private $uf;

    private $establishment_category_id;

    public function __construct(
        string $name,
        string $corporate_name,
        string $cnpj,
        string $public_place,
        string $number,
        string $neighborhoods,
        string $city,
        string $state,
        string $uf,
        int $establishment_category_id
    )
    {
        $this->name = $name;
        $this->corporate_name = $corporate_name;
        $this->cnpj = $cnpj;
        $this->public_place = $public_place;
        $this->number = $number;
        $this->neighborhoods = $neighborhoods;
        $this->city = $city;
        $this->state = $state;
        $this->uf = $uf;
        $this->establishment_category_id = $establishment_category_id;
    }

    /**
     * @return mixed
     */
    public function getName(): string
    {
        return $this->name;
    }

    public function getCorporateName(): string
    {
        return $this->corporate_name;
    }

    public function getCnpj(): string
    {
        return $this->cnpj;
    }

    public function getPublicPlace(): string
    {
        return $this->public_place;
    }

    public function getNumber(): string
    {
        return $this->number;
    }

    public function getNeighborhoods(): string
    {
        return $this->neighborhoods;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getState(): string
    {
        return $this->state;
    }

    public function getUf(): string
    {
        return $this->uf;
    }
    public function getEstablishmentCategoryId(): int
    {
        return $this->establishment_category_id;
    }
}
