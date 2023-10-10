<?php

declare(strict_types=1);

namespace Kernel\DependencyInjection;

use Kernel\Configuration\Configuration;
use Symfony\Component\DependencyInjection\ContainerInterface;

abstract class ServiceContainer
{
    public static ContainerInterface $SERVICE_CONTAINER;

    public static Configuration $CONFIGURATION;

    public static function set(ContainerInterface $container) : void
    {
        self::$SERVICE_CONTAINER = $container;
    }

    public static function get() : ContainerInterface
    {
        return self::$SERVICE_CONTAINER;
    }

    public static function setConfiguration(Configuration $configuration) : void
    {
        self::$CONFIGURATION = $configuration;
        self::get()->set('configuration', self::$CONFIGURATION);
    }

    public static function getConfiguration() : Configuration
    {
        return self::$CONFIGURATION;
    }
}
