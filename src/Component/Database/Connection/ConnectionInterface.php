<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Connection;

use Laventure\Component\Database\Configuration\Contract\ConfigurationInterface;
use Laventure\Component\Database\Connection\Client\ClientConnectionInterface;
use Laventure\Component\Database\Connection\Query\Builder\AbstractQueryBuilder;
use Laventure\Component\Database\Connection\Query\Builder\QueryBuilderInterface;
use Laventure\Component\Database\Connection\Query\QueryInterface;
use Laventure\Component\Database\DatabaseInterface;

/**
 * ConnectionInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection
*/
interface ConnectionInterface
{
    /**
     * Returns the name of connection
     *
     * @return string
    */
    public function getName(): string;






    /**
     * Connect to the database
     *
     * @param ConfigurationInterface $config
     *
     * @return void
    */
    public function connect(ConfigurationInterface $config): void;






    /**
     * Determine if connection established
     *
     * @return bool
    */
    public function connected(): bool;








    /**
     * Disconnect to the database
     *
     * @return void
    */
    public function disconnect(): void;







    /**
     * Returns connection driver like PDO, mysqli ...
     *
     * @return mixed
    */
    public function getConnection(): mixed;






    /**
     * Returns instance of query
     *
     * @return QueryInterface
    */
    public function createQuery(): QueryInterface;








    /**
     * Returns instance of query builder
     *
     * @return QueryBuilderInterface
    */
    public function createQueryBuilder(): QueryBuilderInterface;







    /**
     * Create a statement prepared or not
     *
     * @param string $sql
     *
     * @return QueryInterface
    */
    public function statement(string $sql): QueryInterface;








    /**
     * Returns instance of client
     *
     * @return ClientConnectionInterface
    */
    public function getClient(): ClientConnectionInterface;






    /**
     * Returns instance of database
     *
     * @return DatabaseInterface
    */
    public function getDatabase(): DatabaseInterface;







    /**
     * Returns config params
     *
     * @return ConfigurationInterface
    */
    public function configs(): ConfigurationInterface;
}
