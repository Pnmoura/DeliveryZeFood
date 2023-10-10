<?php

declare(strict_types=1);

namespace Config\Group;

use Config\ConnectionGroup;
use Kernel\Configuration\Configuration;
use Kernel\Configuration\PdoConfigurationConnection;
use Config\Connection;

class DeliveryZeFoodProdConnectionGroup extends Connection implements ConnectionGroup
{
    public function getPdoConfigurationConnection(Configuration $configuration): PdoConfigurationConnection
    {
        $host = $configuration->get('DB_HOST', 'mysql');
        $port = $configuration->get('DB_PORT');
        $user = $configuration->get('DB_USERNAME');
        $password = $configuration->get('DB_PASSWORD');
        $database = $configuration->get('DB_DATABASE');

        return new PdoConfigurationConnection(
            $host,
            $port,
            $user,
            $password,
            $database
        );
    }
}
