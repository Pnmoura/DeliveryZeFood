<?php

namespace Kernel\Connection\Group;

use Kernel\Configuration\Configuration;
use Kernel\Configuration\ConfigurationConnection;
use Kernel\Connection\Connection;
use Kernel\Connection\ConnectionGroup;

class DeliveryZeFoodTestConnectionGroup extends Connection implements ConnectionGroup
{
    public function getConfigurationConnection(Configuration $configuration): ConfigurationConnection
    {
        $host       = $configuration->getDefault('DB_TEST_HOST', 'mysql');
        $database   = $configuration->getDefault('DB_TEST');
        $user       = $configuration->getDefault('DB_TEST_USERNAME');
        $password   = $configuration->getDefault('DB_TEST_PASSWORD');

        return new ConfigurationConnection(
            $host,
            $database,
            $user,
            $password
        );
    }
}
