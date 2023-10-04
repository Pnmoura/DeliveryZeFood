<?php

namespace Kernel\Connection\Group;

use Kernel\Configuration\Configuration;
use Kernel\Configuration\ConfigurationConnection;
use Kernel\Connection\Connection;
use Kernel\Connection\ConnectionGroup;

class DeliveryZeFoodProdConnectionGroup extends Connection implements ConnectionGroup
{
    public function getConfigurationConnection(Configuration $configuration): ConfigurationConnection
    {
        $host       = $configuration->getDefault('DB_HOST', 'mysql');
        $database   = $configuration->getDefault('DB_DATABASE');
        $user       = $configuration->getDefault('DB_USERNAME');
        $password   = $configuration->getDefault('DB_PASSWORD');

        return new ConfigurationConnection(
            $host,
            $database,
            $user,
            $password
        );
    }
}