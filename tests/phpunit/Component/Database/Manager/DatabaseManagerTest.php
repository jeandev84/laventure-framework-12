<?php

declare(strict_types=1);

namespace PHPUnitTest\Component\Database\Manager;

use Laventure\Component\Database\Configuration\Configuration;
use Laventure\Component\Database\Connection\Client\PDO\Drivers\Mysql\MysqlConnection;
use Laventure\Component\Database\Connection\Client\PDO\PdoClient;
use Laventure\Component\Database\Connection\Client\PDO\PdoConnectionInterface;
use Laventure\Component\Database\Connection\ConnectionInterface;
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
        $this->assertInstanceOf(ConnectionInterface::class, $this->connection);
        $this->assertInstanceOf(PdoConnectionInterface::class, $this->connection);
        $this->assertInstanceOf(MysqlConnection::class, $this->connection);
        $this->assertInstanceOf(PDO::class, $this->connection->getConnection());
        $this->assertSame('laventure_test', $this->connection->getDatabase()->getName());
    }
}
