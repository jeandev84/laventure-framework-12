<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Client\Mysqli\Drivers;

use Laventure\Component\Database\Configuration\Contract\ConfigurationInterface;
use Laventure\Component\Database\Configuration\NullConfiguration;
use Laventure\Component\Database\Connection\Client\Mysqli\MysqliClientInterface;
use Laventure\Component\Database\Connection\Drivers\Mysql\MysqlDatabase;
use Laventure\Component\Database\Connection\Exception\ConnectionException;
use Laventure\Component\Database\Connection\Query\Builder\NullQueryBuilder;
use Laventure\Component\Database\Connection\Query\Builder\QueryBuilderInterface;
use Laventure\Component\Database\Connection\Query\NullQuery;
use Laventure\Component\Database\Connection\Query\QueryInterface;
use Laventure\Component\Database\DatabaseInterface;
use mysqli;

/**
 * MysqliConnection
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection\Client\Mysqli\Drivers
 */
class MysqliConnection implements MysqliConnectionInterface
{


    /**
     * @var MysqliClientInterface
    */
    protected MysqliClientInterface $client;


    /**
     * @var mysqli|null
    */
    protected ?mysqli $connection;


    /**
     * @var ConfigurationInterface
   */
    protected ConfigurationInterface $config;



    public function __construct(MysqliClientInterface $client)
    {
        $this->client = $client;
        $this->config = new NullConfiguration();
    }


    /**
     * @inheritDoc
    */
    public function getName(): string
    {
        return 'mysqli';
    }



    /**
     * @inheritDoc
    */
    public function connect(ConfigurationInterface $config): void
    {
        $this->connection = $this->client->makeConnection($config);
        $this->config     = $config;
    }





    /**
     * @inheritDoc
    */
    public function connected(): bool
    {
        return $this->connection instanceof mysqli;
    }





    /**
     * @inheritDoc
    */
    public function disconnect(): void
    {
         // TODO reviews
         $this->connection = null;
    }




    /**
     * @inheritDoc
    */
    public function purge(): void
    {

    }





    /**
     * @inheritDoc
    */
    public function disconnected(): bool
    {
        return false;
    }




    /**
     * @inheritDoc
    */
    public function createQuery(): QueryInterface
    {
        return new NullQuery();
    }




    /**
     * @inheritDoc
    */
    public function createQueryBuilder(): QueryBuilderInterface
    {
        return new NullQueryBuilder();
    }




    /**
     * @inheritDoc
    */
    public function statement(string $sql): QueryInterface
    {
        return $this->createQuery()->prepare($sql);
    }





    /**
     * @inheritDoc
    */
    public function executeQuery(string $sql): bool
    {
        return $this->createQuery()->exec($sql);
    }




    /**
     * @inheritDoc
    */
    public function configs(): ConfigurationInterface
    {
        return $this->config;
    }




    /**
     * @inheritDoc
    */
    public function config($key, $default = null): mixed
    {
         return $this->config->get($key, $default);
    }




    /**
     * @inheritDoc
    */
    public function getDatabase(): DatabaseInterface
    {
        return new MysqlDatabase($this, $this->config->database());
    }




    /**
     * @inheritDoc
    */
    public function getConnection(): mysqli
    {
        return $this->connection;
    }



    /**
     * @inheritDoc
    */
    public function beginTransaction(): bool
    {
        return $this->connection->begin_transaction();
    }




    /**
     * @inheritDoc
    */
    public function hasActiveTransaction(): bool
    {
        return false;
    }




    /**
     * @inheritDoc
    */
    public function commit(): bool
    {
        return $this->connection->commit();
    }





    /**
     * @inheritDoc
    */
    public function rollback(): bool
    {
        return $this->connection->rollback();
    }




    /**
     * @inheritDoc
    */
    public function transaction(callable $func): bool
    {
        try {
            $this->beginTransaction();
            $func($this);
            return $this->commit();
        } catch (\Throwable $e) {
            $this->rollback();
            throw new ConnectionException($e->getMessage(), [], 500);
        }
    }
}