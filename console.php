<?php

use Laventure\Component\Database\Connection\Client\PDO\Factory\PdoConnectionFactory;
use Laventure\Component\Database\Query\Builder\SQL\DML\Insert\InsertBuilder;
use Laventure\Component\Database\Configuration\Configuration;
use Laventure\Component\Database\Query\Builder\SqlQueryBuilder;
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

$qb = new SqlQueryBuilder($connection);

$select = $qb->select('count(p.price), u.username, u.birthday, u.email')
             ->from('users u')
             ->join('products p', 'p.id = u.product_id')
             ->where('u.id = :id')
             ->setParameter('id', 1)
             ->andWhere('u.username = :username')
             ->setParameter('username', 'brown')
             ->orWhere('u.email = :email')
             ->groupBy('p.price')
             ->having('count(p.price) > 500')
             ->orderBy('p.title');

#echo $select->getSQL(), PHP_EOL;


$insert = $qb->insert('users')
             ->values([
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
             ->setValue('foo', ':foo_1')
             ->setValue('foo', ':foo_2', 1)
             ->setValue('foo', ':foo_3', 2)
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


/*
dump($insert->values);
echo $insert->getSQL(), PHP_EOL;
*/


$update = $qb->update('users')
             ->set('username', ':username')
             ->set('city', ':city')
             ->where('id = :id')
             ->setParameters([
                 'username' => 'brown',
                 'city'     => 'Moscow',
                 'id'       => 3
             ]);

echo $update->getSQL(), PHP_EOL;



$file1 = new File(__DIR__.'/storage/sql/update/dump.sql');
$file1->write($update->getSQL());




$delete = $qb->delete('users')
             ->where('id = :id')
             ->setParameter('id', 5);

echo $delete->getSQL(), PHP_EOL;



$file2 = new File(__DIR__.'/storage/sql/delete/dump.sql');
$file2->write($delete->getSQL());



