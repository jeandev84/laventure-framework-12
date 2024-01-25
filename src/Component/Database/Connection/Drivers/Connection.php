<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Drivers;

use Closure;
use Laventure\Component\Database\Configuration\Configuration;
use Laventure\Component\Database\Configuration\Contract\ConfigurationInterface;
use Laventure\Component\Database\Configuration\NullConfiguration;
use Laventure\Component\Database\Connection\Client\ClientConnectionInterface;
use Laventure\Component\Database\Connection\Client\HasClientInterface;
use Laventure\Component\Database\Connection\ConnectionInterface;
use Laventure\Component\Database\Connection\Query\Builder\QueryBuilderInterface;
use Laventure\Component\Database\Connection\Query\QueryInterface;

/**
 * Connection
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection\Drivers
*/
abstract class Connection implements ConnectionInterface
{
    /**
     * @var ClientConnectionInterface
    */
    protected ClientConnectionInterface $client;


    /**
     * @var Configuration
    */
    protected ConfigurationInterface $config;



    /**
     * @param ClientConnectionInterface $client
    */
    public function __construct(ClientConnectionInterface $client)
    {
        $this->client = $client;
        $this->config = new NullConfiguration();
    }





    /**
     * @param ConfigurationInterface $config
     * @return void
    */
    public function connect(ConfigurationInterface $config): void
    {
        $this->client->connect($config);
        $this->config = $config;
    }





    /**
     * @param string $name
     * @param $default
     * @return mixed
    */
    public function config(string $name, $default = null): mixed
    {
        return $this->config->get($name, $default);
    }




    /**
     * @inheritDoc
    */
    public function getConfiguration(): ConfigurationInterface
    {
        return $this->config;
    }




    /**
     * @inheritDoc
    */
    public function connected(): bool
    {
        return $this->client->connected();
    }




    /**
     * @inheritDoc
    */
    public function disconnect(): void
    {
        $this->client->disconnect();
    }





    /**
     * @inheritDoc
    */
    public function disconnected(): bool
    {
        return $this->client->disconnected();
    }





    /**
     * @inheritDoc
    */
    public function getConnection(): mixed
    {
        return $this->client->getConnection();
    }






    /**
     * @return ClientConnectionInterface
    */
    public function getClient(): ClientConnectionInterface
    {
        return $this->client;
    }





    /**
     * @return QueryInterface
    */
    public function createQuery(): QueryInterface
    {
        return $this->client->createQuery();
    }





    /**
     * @return QueryBuilderInterface
    */
    public function createQueryBuilder(): QueryBuilderInterface
    {
        return $this->client->createQueryBuilder();
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
     * @return string
    */
    public function getDatabase(): string
    {
        return $this->config->database();
    }




    /**
     * @return array
    */
    public function getQueries(): array
    {
        return [];
    }







    /**
     * Returns databases
     *
     * @return array
    */
    abstract public function getDatabases(): array;






    /**
     * Create database
     *
     * @return mixed
     */
    abstract public function createDatabase(): mixed;






    /**
     * Drop database
     *
     * @return mixed
    */
    abstract public function dropDatabase(): mixed;








    /**
     * Determine if database exists
     *
     * @return bool
    */
    public function hasDatabase(): bool
    {
        return in_array($this->getDatabase(), $this->getDatabases());
    }






    /**
     * Determine if table name exists in database
     *
     * @param string $name
     *
     * @return bool
    */
    abstract public function hasTable(string $name): bool;







    /**
     * Returns database tables
     *
     * @return array
    */
    abstract public function getTables(): array;
}
