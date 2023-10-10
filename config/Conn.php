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
        if ($_ENV['APP_MODE'] === 'test') {
            $connectionParams = [
                'host' => $_ENV['DB_TEST_HOST'],
                'user' => $_ENV['DB_TEST_USERNAME'],
                'password' => $_ENV['DB_TEST_PASSWORD'],
                'dbname' => $_ENV['DB_TEST'],
                'driver' => $_ENV['DB_TEST_DRIVER'],
            ];
        } elseif ($_ENV['APP_MODE'] === 'prod') {
            $connectionParams = [
                'host' => $_ENV['DB_HOST'],
                'user' => $_ENV['DB_USERNAME'],
                'password' => $_ENV['DB_PASSWORD'],
                'dbname' => $_ENV['DB_DATABASE'],
                'driver' => $_ENV['DB_DRIVER'],
            ];
        } else{
            die('Conexao nao encontrada');
        }

        return DriverManager::getConnection($connectionParams);
    }
}
