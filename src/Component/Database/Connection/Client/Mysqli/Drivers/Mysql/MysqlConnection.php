<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Client\Mysqli\Drivers\Mysql;

use Laventure\Component\Database\Configuration\Contract\ConfigurationInterface;
use Laventure\Component\Database\Connection\Client\Mysqli\Drivers\MysqliConnectionInterface;
use Laventure\Component\Database\Connection\Client\Mysqli\MysqliClientInterface;
use Laventure\Component\Database\Connection\Query\Builder\QueryBuilderInterface;
use Laventure\Component\Database\Connection\Query\QueryInterface;
use Laventure\Component\Database\DatabaseInterface;
use mysqli;

/**
 * MysqlConnection
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection\Client\Mysqli\Drivers\Mysql
 */
class MysqlConnection implements MysqliConnectionInterface
{


    /**
     * @var MysqliClientInterface
    */
    protected MysqliClientInterface $client;


    /**
     * @var mysqli
    */
    protected mysqli $connection;


    public function __construct(MysqliClientInterface $client)
    {
        $this->client = $client;
    }


    /**
     * @inheritDoc
    */
    public function getName(): string
    {
        return 'mysql';
    }



    /**
     * @inheritDoc
    */
    public function connect(ConfigurationInterface $config): void
    {
        $this->connection = $this->client->makeConnection($config);
    }





    /**
     * @inheritDoc
     */
    public function connected(): bool
    {
        // TODO: Implement connected() method.
    }

    /**
     * @inheritDoc
     */
    public function disconnect(): void
    {
        // TODO: Implement disconnect() method.
    }

    /**
     * @inheritDoc
     */
    public function purge(): void
    {
        // TODO: Implement purge() method.
    }

    /**
     * @inheritDoc
     */
    public function disconnected(): bool
    {
        // TODO: Implement disconnected() method.
    }

    /**
     * @inheritDoc
     */
    public function createQuery(): QueryInterface
    {
        // TODO: Implement createQuery() method.
    }

    /**
     * @inheritDoc
     */
    public function createQueryBuilder(): QueryBuilderInterface
    {
        // TODO: Implement createQueryBuilder() method.
    }

    /**
     * @inheritDoc
     */
    public function statement(string $sql): QueryInterface
    {
        // TODO: Implement statement() method.
    }

    /**
     * @inheritDoc
     */
    public function executeQuery(string $sql): bool
    {
        // TODO: Implement executeQuery() method.
    }

    /**
     * @inheritDoc
     */
    public function configs(): ConfigurationInterface
    {
        // TODO: Implement configs() method.
    }

    /**
     * @inheritDoc
     */
    public function config($key, $default = null): mixed
    {
        // TODO: Implement config() method.
    }

    /**
     * @inheritDoc
     */
    public function getDatabase(): DatabaseInterface
    {
        // TODO: Implement getDatabase() method.
    }

    /**
     * @inheritDoc
     */
    public function getConnection(): mysqli
    {
        // TODO: Implement getConnection() method.
    }

    /**
     * @inheritDoc
     */
    public function beginTransaction(): bool
    {
        // TODO: Implement beginTransaction() method.
    }

    /**
     * @inheritDoc
     */
    public function hasActiveTransaction(): bool
    {
        // TODO: Implement hasActiveTransaction() method.
    }

    /**
     * @inheritDoc
     */
    public function commit(): bool
    {
        // TODO: Implement commit() method.
    }

    /**
     * @inheritDoc
     */
    public function rollback(): bool
    {
        // TODO: Implement rollback() method.
    }

    /**
     * @inheritDoc
     */
    public function transaction(callable $func): mixed
    {
        // TODO: Implement transaction() method.
    }
}