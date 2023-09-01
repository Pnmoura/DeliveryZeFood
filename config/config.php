<?php

require_once 'vendor/autoload.php';

return [
    'host' => $_ENV['DB_HOST'],
    'port' => $_ENV['DB_PORT'],
    'user' => $_ENV['DB_USERNAME'],
    'password' => $_ENV['DB_PASSWORD'],
    'dbname' => $_ENV['DB_DATABASE'],
    'driver' => 'pdo_mysql'
];

/*use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\DriverManager;
use Dotenv\Dotenv;

require_once 'vendor/autoload.php';

$dotenv = Dotenv::createImmutable( __DIR__ . '/..');
$dotenv->load();

$config = new Configuration();
$connectionParams = [
    'dbname' => $_ENV['DB_DATABASE'],
    'user' => $_ENV['DB_USERNAME'],
    'password' => $_ENV['DB_PASSWORD'],
    'host' => $_ENV['DB_HOST'],
    'port' => $_ENV['DB_PORT'],
    'driver' => $_ENV['DB_CONNECTION']
];

$conn = DriverManager::getConnection($connectionParams, $config);*/