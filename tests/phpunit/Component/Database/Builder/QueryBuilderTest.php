<?php

declare(strict_types=1);

namespace PHPUnitTest\Component\Database\Builder;

use Laventure\Component\Database\Builder\SQL\DML\InsertBuilder;
use Laventure\Component\Database\Builder\SQL\DQL\SelectBuilder;
use Laventure\Component\Database\Connection\Client\PDO\Drivers\Mysql\MysqlConnection;
use Laventure\Component\Database\Connection\Client\PDO\PdoConnectionInterface;
use Laventure\Component\Database\Connection\ConnectionInterface;
use Laventure\Component\Database\Manager\DatabaseManager;
use PDO;
use PHPUnit\Framework\TestCase;
use PHPUnitTest\App\Entity\Product;

/**
 * DatabaseManagerTest
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  QueryBuilderTest
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




    public function testQuery(): void
    {
        $manager = new DatabaseManager();
        $manager->open('mysql', [
            'dsn' => 'mysql:host=127.0.0.1;dbname=grafikart_shopping_cart;charset=utf8',
            'username' => 'root',
            'password' => 'secret',
            'options' => [
                #PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'
            ],
        ]);

        $connection = $manager->connection();
        $statement = $connection->statement('SELECT * FROM products');
        $statement->map(Product::class);

        $products = $statement->fetch()->all();

        $this->assertTrue($statement->execute());
        $this->assertNotEmpty($products);
        foreach ($products as $product) {
            $this->assertInstanceOf(Product::class, $product);
        }
        $this->assertCount(2, $products);
    }




    public function testSelectQuery(): void
    {
         $builder = new SelectBuilder($this->connection);

         $sql = $builder->select('u.username, u.birthday, u.email')
                        ->from('users', 'u')
                        ->join('products p', 'p.id = u.product_id')
                        ->where('u.id = :id')
                        ->andWhere('u.username = :username')
                        ->orWhere('u.email = :email')
                        ->groupBy('p.price')
                        ->having('count(p.price) > 500')
                        ->orderBy('p.title')
                        ->getSQL();

        /*
         SELECT u.username, u.birthday, u.email
         FROM users u
         JOIN products p ON p.id = u.product_id
         WHERE u.id = :id AND u.username = :username OR u.email = :email
         GROUP BY p.price HAVING count(p.price) > 500
         ORDER BY p.title asc
        */

        $this->assertSame($sql, $builder->getSQL());
    }




    public function testInsertQuery(): void
    {
         $builder = new InsertBuilder($this->connection, 'users');


         $builder->insert([
            'username' => ':username',
            'password' => ':password',
            'city'     => ':city'
         ]);

         $builder->setParameters([
             'username' => 'Brown',
             'password' =>  md5('brown'),
             'city'     => 'Moscow'
         ]);


         echo $builder;
         echo PHP_EOL;
         die;

         $this->assertTrue(true);
    }




    public function testQueryBuilder(): void
    {
        $this->assertTrue(true);
    }
}
