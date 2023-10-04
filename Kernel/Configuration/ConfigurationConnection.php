<?php

declare(strict_types=1);

namespace Kernel\Configuration;

class ConfigurationConnection
{
    private string $host;
    private string $port;
    private string $user;
    private string $password;
    private string $database;

    public function __construct(
        string $host,
        string $port,
        string $user,
        string $password,
        string $database
    )
    {
        $this->host = $host;
        $this->port = $port;
        $this->user = $user;
        $this->password = $password;
        $this->database = $database;
    }

    /**
     * @return string
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * @return string
     */
    public function getPort(): string
    {
        return $this->port;
    }

    /**
     * @return string
     */
    public function getUser(): string
    {
        return $this->user;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getDatabase(): string
    {
        return $this->database;
    }
}