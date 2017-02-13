<?php

require __DIR__ . '/../vendor/autoload.php';

use NoFw\Lib\Application;

$config = require __DIR__ . '/../configs/config.php';

$application = new Application($config);
$application->run();
