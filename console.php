<?php

require 'vendor/autoload.php';


$manager = new \Laventure\Component\Database\Manager\DatabaseManager();
$manager->open('mysql', [
    'dsn'      => 'mysql:host=127.0.0.1;dbname=laventure_test;charset=utf8',
    'username' => 'root',
    'password' => 'secret',
    'options'  => [
        #PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'
    ]
]);


$connection = $manager->connection();

dd($connection->createQueryBuilder());




