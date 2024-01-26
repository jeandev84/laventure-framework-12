<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Connection;

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
     * @inheritDoc
    */
    public function connected(): bool
    {

    }






    /**
     * @inheritDoc
    */
    public function disconnect(): void
    {

    }






    /**
     * @inheritDoc
    */
    public function createQuery(): QueryInterface
    {

    }








    /**
     * @inheritDoc
    */
    public function createQueryBuilder(): QueryBuilderInterface
    {

    }








    /**
     * Execute query
     *
     * @param string $sql
     *
     * @return bool
    */
    public function executeQuery(string $sql): bool
    {

    }








    /**
     * @inheritDoc
    */
    public function connect(ConfigurationInterface $config): void
    {

    }





    /**
     * @inheritDoc
    */
    public function getConnection(): mixed
    {

    }





    /**
     * @inheritDoc
    */
    public function statement(string $sql): QueryInterface
    {

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

    }




    /**
     * @inheritDoc
    */
    public function getConfiguration(): ConfigurationInterface
    {

    }
}
