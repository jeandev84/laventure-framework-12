<?php


#use Laventure\Component\Database\Connection\Client\PDO\Query\QueryBuilder;

use Laventure\Component\Debug\Logger\Logger;
use Laventure\Foundation\Debug\Logger\Writer\DTO\LoggerWriterDto;
use Laventure\Foundation\Debug\Logger\Writer\LoggerWriter;

require 'vendor/autoload.php';


/*
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
*/

$dto     = new LoggerWriterDto(date('Y-m-d H:i:s'), __DIR__.'/temp/log', 'dev');
$writer  = new LoggerWriter($dto);
$logger  = new Logger($writer);

$logger->log();
dd($logger);