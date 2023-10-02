<?php

declare(strict_types=1);

namespace App\Users\Application\Input;

use Exception;

class InputSaveCustomer
{

    private $name;

    private $cpf;

    private $birthdate;

    private $telephone;

    private $address;

    private $number;

    private $complement;

    private $email;

    private $senha;

    public function __construct(
        string $name,
        string $cpf,
        string $birthdate,
        string $telephone,
        string $address,
        string $number,
        string $complement,
        string $email,
        string $senha
    )
    {
        $this->name = $name;
        $this->cpf = $cpf;
        $this->birthdate = $birthdate;
        $this->telephone = $telephone;
        $this->address = $address;
        $this->number = $number;
        $this->complement = $complement;
        $this->email = $email;
        $this->senha = $senha;
    }

    /**
     * @return mixed
     */
    public function getName(): string
    {
        if (empty($this->name)) {
            throw new Exception(
                "O campo name não pode ser vazio",
                422
            );
        }
        return $this->name;
    }

    public function getCpf(): string
    {
        if (empty($this->cpf)) {
            throw new Exception(
                "O campo cpf não pode ser vazio",
                422
            );
        }
        return $this->cpf;
    }

    public function getBirthdate(): string
    {
        if (empty($this->birthdate)) {
            throw new Exception(
                "O campo birthdate não pode ser vazio",
                422
            );
        }
        return $this->birthdate;
    }

    public function getTelephone(): string
    {
        if (empty($this->telephone)) {
            throw new Exception(
                "O campo telephone não pode ser vazio",
                422
            );
        }
        if (!is_numeric($this->telephone)) {
            throw new Exception(
                "O campo telefone deve conter apenas números",
                422
            );
        }
        if (!preg_match('/^\d{11}$/', $this->telephone)) {
            throw new Exception(
                "O campo telefone deve conter exatamente 11 números",
                422
            );
        }

        return $this->telephone;
    }


    public function getAddress(): string
    {
        if (empty($this->address)) {
            throw new Exception(
                "O campo address não pode ser vazio",
                422
            );
        }
        return $this->address;
    }

    public function getNumber(): string
    {
        if (empty($this->number)) {
            throw new Exception(
                "O campo number não pode ser vazio",
                422
            );
        }
        return $this->number;
    }

    public function getComplement(): string
    {
        if (empty($this->complement)) {
            throw new Exception(
                "O campo complemento não pode ser enviado vazio",
                422
            );
        }
        return $this->complement;
    }

    public function getEmail(): string
    {
        if (empty($this->email)) {
            throw new Exception(
                "O campo email não pode ser enviado vazio",
                422
            );
        }
        return $this->email;
    }

    public function getSenha(): string
    {
        if (empty($this->senha)) {
            throw new Exception(
                "O campo senha não pode ser enviado vazio",
                422
            );
        }
        return $this->senha;
    }
}
