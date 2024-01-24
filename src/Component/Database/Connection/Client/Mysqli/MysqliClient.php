<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Client\Mysqli;

use Closure;
use Laventure\Component\Database\Configuration\Contract\ConfigurationInterface;
use Laventure\Component\Database\Connection\Client\Mysqli\Query\QueryBuilder;
use Laventure\Component\Database\Connection\Query\Builder\QueryBuilderInterface;
use Laventure\Component\Database\Connection\Query\NullQuery;
use Laventure\Component\Database\Connection\Query\QueryInterface;

/**
 * MysqliClient
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection\Client\Mysqli
 */
class MysqliClient implements MysqliClientInterface
{
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

    }




    /**
     * @inheritDoc
    */
    public function connected(): bool
    {
        return false;
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
    public function disconnected(): bool
    {
        return false;
    }






    /**
     * @inheritDoc
    */
    public function getConnection(): mixed
    {
        return null;
    }




    /**
     * @inheritDoc
    */
    public function createQueryBuilder(): QueryBuilderInterface
    {
        return new QueryBuilder();
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
    public function beginTransaction(): bool
    {
        return false;
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
        return false;
    }





    /**
     * @inheritDoc
    */
    public function rollback(): bool
    {
        return false;
    }




    /**
     * @inheritDoc
    */
    public function transaction(Closure $func): mixed
    {
        return false;
    }
}
