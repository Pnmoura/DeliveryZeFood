<?php

declare(strict_types=1);

$config = new \Kernel\Configuration\Configuration();
$config
    ->set('APP_DEBUG', true)
    ->set('APP_LOG_ENABLED', true)
    ->set('APP_MODE', 'test');

$kernel = new \Kernel\Kernel();
$kernel->run($config, false);

$connectionForTest = new \Config\Group\DeliveryZeFoodTestConnectionGroup();

print "->Clear Drop Tables for test \n";

$connectionForTest->getConnection()->executeQuery("
    SET FOREIGN_KEY_CHECKS = 0;
    SET GROUP_CONCAT_MAX_LEN=32768;
    SET @tables = NULL;
    SELECT GROUP_CONCAT('`', table_name, '`') INTO @tables
      FROM information_schema.tables
      WHERE table_schema = (SELECT DATABASE());
    SELECT IFNULL(@tables,'dummy') INTO @tables;
    SET @tables = CONCAT('DROP TABLE IF EXISTS ', @tables);
    PREPARE stmt FROM @tables;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;
    SET FOREIGN_KEY_CHECKS = 1;
");

print "->Execution Migrations for test \n";

exec('php migrate-test migrate --all-or-nothing --no-interaction');

print "->Execution suite of test \n";
