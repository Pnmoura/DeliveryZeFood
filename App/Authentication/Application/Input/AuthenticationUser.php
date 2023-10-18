<?php

declare(strict_types=1);

namespace App\Authentication\Application\Input;

class AuthenticationUser
{
    private string $login;

    private string $senha;

    public function __construct(string $login, string $senha)
    {
        $this->login = $login;
        $this->senha = $senha;
    }

    public function getLogin(): string
    {
        if (empty($this->login)) {
            throw new \Exception(
                "O campo login nao pode ser vazio",
                422
            );
        }
        return $this->login;
    }

    public function getSenha(): string
    {
        if (empty($this->senha)) {
            throw new \Exception(
                "O campo senha nao pode ser vazio",
                422
            );
        }
        return $this->senha;
    }
}