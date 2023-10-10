#!/usr/bin/env php
<?php

require 'vendor/autoload.php';

$connectionTest = new \Config\Group\DeliveryZeFoodProdConnectionGroup();

$connection = $connectionTest->getConnection();
$config = new \Doctrine\Migrations\Configuration\Migration\PhpFile('migrations.php');

$dependencyFactory = \Doctrine\Migrations\DependencyFactory::fromConnection(
        $config, new \Doctrine\Migrations\Configuration\Connection\ExistingConnection($connection)
);

$cli = new \Symfony\Component\Console\Application('Doctrine Migration');
$cli->setCatchExceptions(true);

$cli->addCommands([
    new \Doctrine\Migrations\Tools\Console\Command\DumpSchemaCommand($dependencyFactory),
    new \Doctrine\Migrations\Tools\Console\Command\ExecuteCommand($dependencyFactory),
    new \Doctrine\Migrations\Tools\Console\Command\GenerateCommand($dependencyFactory),
    new \Doctrine\Migrations\Tools\Console\Command\LatestCommand($dependencyFactory),
    new \Doctrine\Migrations\Tools\Console\Command\ListCommand($dependencyFactory),
    new \Doctrine\Migrations\Tools\Console\Command\MigrateCommand($dependencyFactory),
    new \Doctrine\Migrations\Tools\Console\Command\RollupCommand($dependencyFactory),
    new \Doctrine\Migrations\Tools\Console\Command\StatusCommand($dependencyFactory),
    new \Doctrine\Migrations\Tools\Console\Command\SyncMetadataCommand($dependencyFactory),
    new \Doctrine\Migrations\Tools\Console\Command\VersionCommand($dependencyFactory),
]);

$cli->run();
