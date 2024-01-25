<?php


use Laventure\Component\Database\Connection\Client\PDO\Query\QueryBuilder;

require 'vendor/autoload.php';


$queryBuilder = new QueryBuilder();

$sql = $queryBuilder->select('u.username, u.birthday, u.email')
                    ->from('users', 'u')
                    ->join('products p', 'p.id = u.product_id')
                    ->where('u.id = :id')
                    ->andWhere('u.username = :username')
                    ->orWhere('u.email = :email')
                    ->groupBy('p.price')
                    ->having('count(p.price) > 500')
                    ->orderBy('p.title')
                    ->getSQL();

