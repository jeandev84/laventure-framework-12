<?php

use Laventure\Component\Database\Connection\Client\PDO\Query\QueryBuilder;

require 'vendor/autoload.php';


$qb = new QueryBuilder();

$qb = $qb->insert('users')
         ->values([
             'username' => ':username',
             'password' => ':password',
             'age'      => ':age'
         ])
         ->setValue('city', ':city')
         #->setValue('city', ':city')
         ->setValue('address', ':address')
         ->setParameters([
             'username' => 'Brown',
             'password' => md5(uniqid()),
             'age'      => 25,
             'city'     => 'Moscow',
             'address'  => 'Golovinskoe shosse dom 8 korpus 2A'
         ]);


/* dd(array_unique($qb->getCriteria()->insert->columns)); */

dump($qb->getCriteria()->insert);
dump($qb->getParameters());


