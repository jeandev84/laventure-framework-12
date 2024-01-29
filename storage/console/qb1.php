<?php

require 'vendor/autoload.php';


$manager = new \Laventure\Component\Database\Manager\DatabaseManager();



/*
$manager    = ConnectionMaker::make();
$connection = $manager->connection();

$insert1 = new InsertBuilder($connection, 'users');
$insert1->insert([
    'username' => 'Brown',
    'password' => md5('brown'),
    'city'     => 'Moscow',
    'age'      => 25
]);

echo $insert1->getSQL(), PHP_EOL;

$insert2 = new InsertBuilder($this->connection, 'users');
$insert2->insert([
    'username' => ':username',
    'password' => ':password',
    'city'     => ':city',
    'age'      => ':age'
])
->setParameters([
    'username' => 'Brown',
    'password' =>  md5('brown'),
    'city'     => 'Moscow',
    'age'      => 25
]);
*/







