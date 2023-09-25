<?php

declare(strict_types=1);

namespace App\Users\Service;

use App\Users\Application\Input\InputSaveCustomer;
use App\Users\Repository\UserRepository;

class UserService
{
    private $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function showUsers(): array
    {
        return $this->userRepository->listUsersService();
    }

    public function insertUsersService(InputSaveCustomer $inputSaveCustomer): int
    {
        $data = [
            'fullname' => $inputSaveCustomer->getName(),
            'cpf' => $inputSaveCustomer->getCpf(),
            'birthdate' => $inputSaveCustomer->getBirthdate(),
            'telephone' => $inputSaveCustomer->getTelephone(),
            'address' => $inputSaveCustomer->getAddress()
        ];

        return $this->userRepository->insertService($data);
    }
}
