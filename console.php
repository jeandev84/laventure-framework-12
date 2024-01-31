<?php

use Laventure\Component\Database\Connection\Client\PDO\Factory\PdoConnectionFactory;
use Laventure\Component\Database\Query\Builder\SQL\DML\Insert\InsertBuilder;
use Laventure\Component\Database\Configuration\Configuration;
use Laventure\Component\Filesystem\File\File;

require 'vendor/autoload.php';


// select * from users where ...
$factory    = new PdoConnectionFactory();
$connection = $factory->create('mysql');

$connection->connect(new Configuration([
    'dsn'      => 'mysql:host=127.0.0.1;dbname=laventure_test;charset=utf8',
    'username' => 'root',
    'password' => 'secret',
    'options'  => [
        #PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'
    ]
]));

$qb = new InsertBuilder($connection, 'users');
$qb = $qb->values([
             'username' => ":username_1",
             'password' => ":password_1",
             'city'     => ":city_1"
         ])
         ->values([
             'username' => ":username_2",
             'password' => ":password_2",
             'city'     => ":city_2"
         ])
         ->values([
             'username' => ":username_3",
             'password' => ":password_3",
             'city'     => ":city_3"
         ])
         ->setValue('foo', ':foo')
         ->setValue('foo', ':foo', 1)
         ->setValue('foo', ':foo', 2)
         ->setParameters([
             'username_1' => '#user1',
             'password_1' => md5(uniqid()),
             'city_1'     => 'Moscow1',
             'username_2' => '#user2',
             'password_2' => md5(uniqid()),
             'city_2'     => 'Moscow2',
             'username_3' => '#user3',
             'password_3' => md5(uniqid()),
             'city_3'     => 'Moscow3'
         ]);




#echo $qb->getSQL(), PHP_EOL;

/*
$file = new File(__DIR__.'/storage/sql/insert/pdo/dump-2.sql');
$file->append($qb->getSQL());
*/

