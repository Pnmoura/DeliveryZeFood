<?php

declare(strict_types=1);

namespace Config\Group;

use Kernel\Configuration\Configuration;
use Kernel\Configuration\PdoConfigurationConnection;
use Config\Connection;
use Config\ConnectionGroup;

class DeliveryZeFoodTestConnectionGroup extends Connection implements ConnectionGroup
{
    public function getPdoConfigurationConnection(Configuration $configuration): PdoConfigurationConnection
    {
        $host = $configuration->get('DB_TEST_HOST', 'mysql');
        $port = $configuration->get('DB_PORT');
        $user = $configuration->get('DB_TEST_USERNAME');
        $password = $configuration->get('DB_TEST_PASSWORD');
        $database = $configuration->get('DB_TEST');

        return new PdoConfigurationConnection(
            $host,
            $port,
            $user,
            $password,
            $database
        );
    }
}
