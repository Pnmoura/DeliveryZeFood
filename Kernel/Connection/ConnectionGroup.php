<?php

declare(strict_types=1);

namespace Kernel\Connection;

use Kernel\Configuration\Configuration;
use Kernel\Configuration\ConfigurationConnection;

interface ConnectionGroup
{
    public function getConfigurationConnection(Configuration $configuration):ConfigurationConnection;

    public function getConnection(): \Doctrine\DBAL\Connection;

    public function getName(): string;
}
