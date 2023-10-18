<?php

declare(strict_types=1);

namespace App\Authentication\Service;

use App\Authentication\Repository\AuthenticationUserRepository;

class AuthenticationService
{
    private $authenticationUserRepository;

    public function __construct()
    {
        $this->authenticationUserRepository = new AuthenticationUserRepository();
    }

    public function list(): array
    {
        return $this->authenticationUserRepository->dataUsers();
    }
}
