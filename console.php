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


echo $selectSQL, PHP_EOL;

/*
SELECT count(p.price), u.username, u.birthday, u.email
FROM users u
JOIN products p ON p.id = u.product_id
WHERE u.id = :id AND u.username = :username OR u.email = :email
GROUP BY p.price
HAVING count(p.price) > 500
ORDER BY p.title asc;
*/
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
]);

echo $insertSQL->getSQl(), PHP_EOL;

/*
INSERT INTO users (username, password, city)
VALUES (:username_0, :password_0, :city_0),
       (:username_1, :password_1, :city_1),
       (:username_2, :password_2, :city_2);
============================================
$insertSQL = $qb->insert('users', [
    'username' => "User#1",
    'password' => md5(uniqid()),
    'city'     => "City#1"
]);
*/


$updateSQL = $qb->update('users', [
    'username' => "User#1",
    'password' => md5(uniqid()),
    'city'     => "City#1"
], [
    'id' => 5
]);

echo $updateSQL->getSQL(), PHP_EOL;

/*
UPDATE users
SET username = :username, password = :password, city = :city
WHERE id = :id;
*/

#dd($insertSQL->values, $insertSQL->getParameters());
#echo $insertSQL, PHP_EOL;

$deleteSQL = $qb->delete('users', [
    'id' => 3
]);


echo $deleteSQL->getSQL(), PHP_EOL;
# dump($deleteSQL->getParameters());
/*
DELETE FROM users WHERE id = :id;
*/
