<?php

require __DIR__ . '/../vendor/autoload.php';

use NoFw\Lib\Application;

$config = require __DIR__ . '/../configs/config.php';

$application = new Application($config);
$application->run();

// $pdo = new \PDO('mysql:host=testeconnectparts_db_1;dbname=teste;', 'root', '1');
// var_dump($pdo);
// $stmt = $pdo->prepare('select * from t where name = :name');
// $stmt->execute(['name'=>'OTavio']);
// var_dump($stmt->fetchAll());