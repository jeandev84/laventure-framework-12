<?php

declare(strict_types=1);

namespace PHPUnitTest\Component\Database\Manager;

use Laventure\Component\Config\Config;
use Laventure\Component\Database\Connection\Client\PDO\PdoClient;
use Laventure\Component\Database\Connection\ConnectionInterface;
use Laventure\Component\Database\Connection\Drivers\Mysql\MysqlConnection;
use Laventure\Component\Database\Connection\Drivers\Sqlite\SqliteConnection;
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
    protected DatabaseManager $database;
    protected ConnectionInterface $connection;


    protected function setUp(): void
    {
        // For this test you have to create a real database and testing connection
        $client            = new PdoClient();
        $this->database    = new DatabaseManager();
        $config            = new Config(require __DIR__.'/config/database.php');

        $connection  = $config->get('connection');
        $extension   = $config->get('extension');
        $credentials = $config->get("connections.$extension.$connection");

        $this->database->open('mysql', $credentials);
        $this->connection = $this->database->connection();
    }







    public function testConnection(): void
    {
        $this->assertSame('mysql', $this->database->getCurrentConnection());
        $this->assertSame('pdo', $this->database->getCurrentExtension());
        $this->assertNotEmpty($this->database->getConnections());
        $this->assertSame([
            'dsn'      => 'mysql:host=127.0.0.1;dbname=grafikart_shopping_cart;charset=utf8',
            'username' => 'root',
            'password' => 'secret',
            'options'  => [
                #PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'
            ],
        ], $this->database->configuration('mysql'));
        $this->assertInstanceOf(ConnectionInterface::class, $this->connection);
        $this->assertTrue($this->connection->connected());

        $this->database->extension('mysqli');

        $this->assertSame('mysqli', $this->database->getCurrentExtension());
    }





    public function testQuery(): void
    {
        $statement = $this->connection->statement('SELECT * FROM products');
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
