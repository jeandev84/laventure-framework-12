<?php
#declare(strict_types=1);

namespace PHPUnitTest\Component\Database\Connection\Client\PDO\Query;

use PHPUnit\Framework\TestCase;

/**
 * QueryBuilderTest
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  PHPUnitTest\Component\Database\ConnectionMaker\Extensions\PDO\Query
 */
class QueryBuilderTest extends TestCase
{

//    protected DatabaseManager $manager;
//
//
//    protected ConnectionInterface $connection;
//
//    protected function setUp(): void
//    {
//        $manager = new DatabaseManager();
//        $manager->open('mysql', [
//            'dsn' => 'mysql:host=127.0.0.1;dbname=laventure_test;charset=utf8',
//            'username' => 'root',
//            'password' => 'secret',
//            'options' => [
//                #PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
//                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'
//            ],
//        ]);
//
//        $this->connection = $manager->connection();
//        $this->manager    = $manager;
//    }
//
//
//    public function testSelectQuery(): void
//       {
//           $qb = new AbstractQueryBuilder($this->connection);
//
//           $sql =  $qb->select('u.username, u.birthday, u.email')
//                      ->from('users', 'u')
//                      ->join('products p', 'p.id = u.product_id')
//                      ->where('u.id = :id')
//                      ->andWhere('u.username = :username')
//                      ->orWhere('u.email = :email')
//                      ->groupBy('p.price')
//                      ->having('count(p.price) > 500')
//                      ->orderBy('p.title')
//                      #->insert('users')
//                      ->getSQL();
//
//           #echo $sql. PHP_EOL;
//           $this->assertNotEmpty($sql);
//       }
//
//
//
//       public function testInsert(): void
//       {
//           $qb = new AbstractQueryBuilder($this->connection);
//
//           $q1 = $qb->insert('users')
//                    ->values([
//                       'username' => 'Brown',
//                       'password' => md5('brown'),
//                       'city'     => 'Moscow'
//                    ]);
//
//
//           $q2 = $qb->insert('users')
//                    ->values([
//                       [
//                           'username' => 'Brown1',
//                           'password' => md5('brown1'),
//                           'city'     => 'Moscow1'
//                       ],
//                       [
//                           'username' => 'Brown2',
//                           'password' => md5('brown2'),
//                           'city'     => 'Moscow2'
//                       ]
//                   ]);
//
//           dd($q2->getSQL(), $q2->getParameters());
//           $this->assertNotEmpty($q1->getSQL());
//           $this->assertNotEmpty($q1->getParameters());
//           $this->assertNotEmpty($q1->getSQL());
//           $this->assertNotEmpty($q2->getParameters());
//       }




         public function testItWorks(): void
         {
             $this->assertTrue(true);
         }
}
