<?php

declare(strict_types=1);

namespace Config;

use Doctrine\DBAL\DriverManager;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../', '.env');
$dotenv->load();

class Conn
{
    public function createDatabaseConnection()
    {
        if ($_ENV['APP_MODE'] === 'TEST') {
            $connectionParams = [
                'host' => $_ENV['DB_HOST'],
                'user' => $_ENV['DB_USERNAME'],
                'password' => $_ENV['DB_PASSWORD'],
                'dbname' => $_ENV['DB_TEST'],
                'driver' => $_ENV['DB_DRIVER'],
            ];
        } else {
            $connectionParams = [
                'host' => $_ENV['DB_HOST'],
                'user' => $_ENV['DB_USERNAME'],
                'password' => $_ENV['DB_PASSWORD'],
                'dbname' => $_ENV['DB_DATABASE'],
                'driver' => $_ENV['DB_DRIVER'],
            ];
        }

        return DriverManager::getConnection($connectionParams);
    }
}
