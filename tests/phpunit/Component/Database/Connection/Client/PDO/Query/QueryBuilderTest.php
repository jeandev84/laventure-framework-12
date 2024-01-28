<?php
declare(strict_types=1);

namespace PHPUnitTest\Component\Database\Connection\Client\PDO\Query;

use Laventure\Component\Database\Connection\Client\PDO\PdoConnectionInterface;
use Laventure\Component\Database\Connection\Client\PDO\Query\QueryBuilder;
use Laventure\Component\Database\Connection\ConnectionInterface;
use Laventure\Component\Database\Manager\DatabaseManager;
use PDO;
use PHPUnit\Framework\TestCase;

/**
 * QueryBuilderTest
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  PHPUnitTest\Component\Database\Connection\Client\PDO\Query
 */
class QueryBuilderTest extends TestCase
{

    protected DatabaseManager $manager;


    protected ConnectionInterface $connection;

    protected function setUp(): void
    {
        $manager = new DatabaseManager();
        $manager->open('mysql', [
            'dsn' => 'mysql:host=127.0.0.1;dbname=laventure_test;charset=utf8',
            'username' => 'root',
            'password' => 'secret',
            'options' => [
                #PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'
            ],
        ]);

        $this->connection = $manager->connection();
        $this->manager    = $manager;
    }


    public function testSelectQuery(): void
       {
           $qb = new QueryBuilder($this->connection);

           $sql =  $qb->select('u.username, u.birthday, u.email')
                      ->from('users', 'u')
                      ->join('products p', 'p.id = u.product_id')
                      ->where('u.id = :id')
                      ->andWhere('u.username = :username')
                      ->orWhere('u.email = :email')
                      ->groupBy('p.price')
                      ->having('count(p.price) > 500')
                      ->orderBy('p.title')
                      #->insert('users')
                      ->getSQL();

           dd($sql);
       }
}
