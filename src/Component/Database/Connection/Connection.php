<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Connection;

use Laventure\Component\Database\Configuration\Configuration;
use Laventure\Component\Database\Configuration\Contract\ConfigurationInterface;
use Laventure\Component\Database\Connection\Client\ClientConnectionInterface;
use Laventure\Component\Database\Connection\Query\Builder\QueryBuilderInterface;
use Laventure\Component\Database\Connection\Query\QueryInterface;
use Laventure\Component\Database\Connection\Status\ConnectionStatusInterface;
use Laventure\Component\Database\Connection\Transaction\TransactionInterface;

/**
 * Connection
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection
*/
abstract class Connection implements ConnectionInterface
{
    /**
     * @var ClientConnectionInterface
    */
    protected ClientConnectionInterface $client;



    /**
     * @var ConfigurationInterface
    */
    protected ConfigurationInterface $config;



    /**
     * @param ClientConnectionInterface $client
     */
    public function __construct(ClientConnectionInterface $client)
    {
        $this->client = $client;
        $this->config = new Configuration();
    }








    /**
     * @inheritDoc
    */
    public function connect(ConfigurationInterface $config): void
    {
        $this->client->connect($config);
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
    public function getConnection(): mixed
    {
        return $this->client->getConnection();
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
    public function createQuery(): QueryInterface
    {
        return $this->client->createQuery();
    }






    /**
     * Execute query
     *
     * @param string $sql
     *
     * @return bool
    */
    public function executeQuery(string $sql): mixed
    {
        return $this->createQuery()->exec($sql);
    }







    /**
     * @inheritDoc
    */
    public function getClient(): ClientConnectionInterface
    {

    }





    /**
     * Retrieve value of given key
     *
     * @param $key
     * @param $default
     * @return mixed
    */
    public function config($key, $default = null): mixed
    {
        return $this->config->get($key, $default);
    }




    /**
     * @inheritDoc
    */
    public function configs(): ConfigurationInterface
    {
        return $this->config;
    }




    /**
     * @return string
    */
    public function getDatabaseName(): string
    {
        return $this->config->database();
    }
}
