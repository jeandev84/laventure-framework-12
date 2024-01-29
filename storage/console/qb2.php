<?php

use Laventure\Component\Database\Connection\Client\PDO\Factory\PdoConnectionFactory;
use Laventure\Component\Database\Connection\Client\PDO\PdoClient;

require 'vendor/autoload.php';

$client     = new PdoClient();
$factory    = new PdoConnectionFactory();
$connection = $factory->createConnection($client, 'mysql');
$config     = new \Laventure\Component\Database\Configuration\Configuration([
    'dsn' => 'mysql:host=127.0.0.1;dbname=laventure_test;charset=utf8',
    'username' => 'root',
    'password' => 'secret',
    'options' => [
        #PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'
    ],
]);

$connection->connect($config);


dd($connection->getConnection());










