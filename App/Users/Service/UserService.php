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
        return $this->userRepository->showUsersService();
    }

    public function insertUsersService(InputSaveCustomer $inputSaveCustomer): int
    {
        $data = [
            'fullname' => $inputSaveCustomer->getName(),
            'cpf' => $inputSaveCustomer->getCpf(),
            'birthdate' => $inputSaveCustomer->getBirthdate(),
            'telephone' => $inputSaveCustomer->getTelephone(),
            'address' => $inputSaveCustomer->getAddress(),
            'number' => $inputSaveCustomer->getNumber(),
            'complement' => $inputSaveCustomer->getComplement()
        ];

        return $this->userRepository->insertUser($data);
    }
}
