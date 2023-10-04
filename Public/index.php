<?php

require_once '../vendor/autoload.php';
// require_once '../Routes/route.php';

$kernel = new \Kernel\Kernel();
$kernel->run(
    new Kernel\Configuration\Configuration()
);