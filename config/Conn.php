<?php

declare(strict_types=1);

namespace Config;

use Doctrine\DBAL\DriverManager;

class Conn
{
    public function createDatabaseConnection()
    {
        $connectionParams = [
            'host' => $_ENV['DB_HOST'],
            'user' => $_ENV['DB_USERNAME'],
            'password' => $_ENV['DB_PASSWORD'],
            'dbname' => $_ENV['DB_DATABASE'],
            'driver' => $_ENV['DB_DRIVER'],
        ];

        return DriverManager::getConnection($connectionParams);
    }
}
