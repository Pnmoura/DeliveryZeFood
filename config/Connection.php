<?php

declare(strict_types=1);

namespace Config;

use Config\Group\DeliveryZeFoodProdConnectionGroup;
use Kernel\Configuration\Configuration;
use Kernel\Configuration\PdoConfigurationConnection;

abstract class Connection
{
    protected static ?array $CONNECTION_ORM = [];

    protected static ?Configuration $CONFIGURATION = null;

    use Timezone;


    public function getName() : string
    {
        return get_class($this);
    }

    protected function getGetPdoConfigurationConnection(): PdoConfigurationConnection
    {
        if (strtolower($this->getConfiguration()->get('APP_MODE')) === 'test') {
            return (
                new DeliveryZeFoodProdConnectionGroup()
            )->getPdoConfigurationConnection($this->getConfiguration());
        }

        return $this->getPdoConfigurationConnection($this->getConfiguration());
    }

    protected function getConfiguration(): Configuration
    {
        if (self::$CONFIGURATION === null) {
            self::$CONFIGURATION = new Configuration();
        }

        return self::$CONFIGURATION;
    }

    public function getConnection() : \Doctrine\DBAL\Connection
    {
        $configuration = $this->getGetPdoConfigurationConnection();

        if ((self::$CONNECTION_ORM[$this->getName()] ?? null) === null) {
            self::$CONNECTION_ORM[$this->getName()] = \Doctrine\DBAL\DriverManager::getConnection([
                'dbname' => $configuration->getDatabase(),
                'user' => $configuration->getUser(),
                'password' => $configuration->getPassword(),
                'host' => $configuration->getHost(),
                'port' => $configuration->getPort(),
                'driver' => 'pdo_mysql',
                'driverOptions' => [
                    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                    \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8; SET time_zone = '" . $this->getTimezone() . "';"
                ],
            ]);
        }

        return self::$CONNECTION_ORM[$this->getName()];
    }
}
