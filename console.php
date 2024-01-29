<?php

use Laventure\Component\Database\Connection\Client\PDO\Query\QueryBuilder;

require 'vendor/autoload.php';


$qb = new QueryBuilder();


$qb = $qb->select('u.username, u.birthday, u.email')
          ->from('users', 'u')
          ->join('products p', 'p.id = u.product_id')
          ->where('u.id = :id')
          ->andWhere('u.username = :username')
          ->orWhere('u.email = :email')
          ->groupBy('p.price')
          ->having('count(p.price) > 500')
          ->orderBy('p.title');


dump($qb->getCriteria());
echo $qb->getSQL(), PHP_EOL;

/*
SELECT u.username, u.birthday, u.email
FROM users u
JOIN products p ON p.id = u.product_id
WHERE u.id = :id AND u.username = :username OR u.email = :email
GROUP BY p.price
HAVING count(p.price) > 500
ORDER BY p.title asc;
*/




