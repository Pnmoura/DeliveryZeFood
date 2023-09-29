<?php

declare(strict_types=1);

namespace App\Products\Application\Input;

class InputSaveCategoryProducts
{
    private $name;

    public function __construct(
        string $name
    )
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName(): string
    {
        return $this->name;
    }
}
