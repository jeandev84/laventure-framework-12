<?php

use Laventure\Component\Database\Manager\DatabaseManager;
use Laventure\Component\Database\Query\Builder\SqlQueryBuilder;

require 'vendor/autoload.php';


$manager = new DatabaseManager();
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

$qb = $connection->createQueryBuilder();

$selectSQL = $qb->select('count(p.price), u.username, u.birthday, u.email')
                ->from('users u')
                ->join('products p', 'p.id = u.product_id')
                ->where('u.id = :id')
                ->andWhere('u.username = :username')
                ->orWhere('u.email = :email')
                ->groupBy('p.price')
                ->having('count(p.price) > 500')
                ->orderBy('p.title')
                ->setParameters([
                    'id' => 1,
                    'username' => 'brown',
                    'email'    => 'brown@demo.ru'
                ])
                ->getSQL();


#echo $selectSQL, PHP_EOL;

$insertSQL = $qb->insert('users', [
    [
        'username' => "User#1",
        'password' => md5(uniqid()),
        'city'     => "City#1"
    ],
    [
        'username' => "User#1",
        'password' => md5(uniqid()),
        'city'     => "City#1"
    ],
    [
        'username' => "User#1",
        'password' => md5(uniqid()),
        'city'     => "City#1"
    ]
])->getSQL();

/*
$insertSQL = $qb->insert('users', [
    'username' => "User#1",
    'password' => md5(uniqid()),
    'city'     => "City#1"
]);
*/


#dd($insertSQL->values, $insertSQL->getParameters());

echo $insertSQL, PHP_EOL;