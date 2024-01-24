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
    public function testConnection(): void
    {
        // For this test you have to create a real database and testing connection
        $client      = new PdoClient();
        $database    = new DatabaseManager();
        $config      = new Config(require __DIR__.'/config/database.php');

        $connection  = $config->get('connection');
        $extension   = $config->get('extension');
        $credentials = $config->get("connections.$extension.$connection");

        $database->open('mysql', $credentials);
        $connection = $database->connection();

        $this->assertSame('mysql', $database->getCurrentConnection());
        $this->assertSame('pdo', $database->getCurrentExtension());
        $this->assertNotEmpty($database->getConnections());
        $this->assertSame([
            'dsn'      => 'mysql:host=127.0.0.1;dbname=grafikart_shopping_cart;charset=utf8',
            'username' => 'root',
            'password' => 'secret',
            'options'  => [
                #PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'
            ],
        ], $database->configuration('mysql'));
        $this->assertInstanceOf(ConnectionInterface::class, $connection);
        $this->assertTrue($connection->connected());

        $database->extension('mysqli');

        $this->assertSame('mysqli', $database->getCurrentExtension());
    }
}
