<?php

declare(strict_types=1);

namespace Kernel\Connection;

use Doctrine\DBAL\DriverManager;
use Kernel\Configuration\Configuration;
use Kernel\Configuration\ConfigurationConnection;
use Kernel\Connection\Group\DeliveryZeFoodTestConnectionGroup;

abstract class Connection
{
    protected static array|null $CONNECTION_ORM = [];
    protected static Configuration|null $CONFIGURATION = null;

    public function getName(): string
    {
        return get_class($this);
    }
    protected function getConfiguration(): Configuration
    {
        if (self::$CONFIGURATION === null) {
            self::$CONFIGURATION = new Configuration();
        }

        return self::$CONFIGURATION;
    }

    protected function getConfigurationConnection(): ConfigurationConnection
    {
        if (strtolower($this->getConfiguration()->getDefault('APP_MODE')) === 'test') {
            return (
                new DeliveryZeFoodTestConnectionGroup()
            )->getConfigurationConnection($this->getConfiguration());
        }

        return $this->getConfigurationConnection($this->getConfiguration());
    }

    public function getConnection() : \Doctrine\DBAL\Connection
    {
        $configuration = $this->getConfigurationConnection();

        if ((self::$CONNECTION_ORM[$this->getName()] ?? null) === null) {
            self::$CONNECTION_ORM[$this->getName()] = DriverManager::getConnection([
                'dbname' => $configuration->getDatabase(),
                'user' => $configuration->getUser(),
                'password' => $configuration->getPassword(),
                'host' => $configuration->getHost(),
                'driver'=> 'pdo_mysql'
            ]);
        }

        return self::$CONNECTION_ORM[$this->getName()];
    }
}
