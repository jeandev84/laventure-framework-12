<?php

declare(strict_types=1);

namespace PHPUnitTest\Component\Database\Manager;

use Laventure\Component\Database\Connection\Client\PDO\Drivers\Mysql\MysqlConnection;
use Laventure\Component\Database\Connection\Client\PDO\Drivers\PdoConnectionInterface;
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
 * @package  PHPUnitTest\Component\Database\Manager
 */
class DatabaseManagerTest extends TestCase
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



    public function testConnection(): void
    {
        $this->assertSame('mysql', $this->manager->getCurrentConnection());
        $this->assertSame('pdo', $this->manager->getCurrentExtension());
        $this->assertNotEmpty($this->manager->getConnections());
        $this->assertInstanceOf(ConnectionInterface::class, $this->connection);
        $this->assertInstanceOf(PdoConnectionInterface::class, $this->connection);
        $this->assertInstanceOf(MysqlConnection::class, $this->connection);
        $this->assertInstanceOf(PDO::class, $this->connection->getConnection());
        $this->assertTrue($this->connection->connected());
        $this->assertSame('laventure_test', $this->connection->getDatabase()->getName());
        $this->assertSame([
            'dsn' => 'mysql:host=127.0.0.1;dbname=laventure_test;charset=utf8',
            'username' => 'root',
            'password' => 'secret',
            'options' => [
                #PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'
            ],
        ], $this->manager->configuration('mysql'));
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
}
