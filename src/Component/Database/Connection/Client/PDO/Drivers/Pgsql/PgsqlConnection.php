<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Client\PDO\Drivers\Pgsql;

use Laventure\Component\Database\Connection\Client\PDO\Drivers\Connection;
use Laventure\Component\Database\Connection\Drivers\Pgsql\PgsqlDatabase;
use Laventure\Component\Database\Connection\Query\QueryBuilderInterface;
use Laventure\Component\Database\DatabaseInterface;

/**
 * PgsqlConnection
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection\Client\PDO\Drivers\Pgsql
 */
class PgsqlConnection extends Connection
{
    /**
     * @inheritDoc
    */
    public function getName(): string
    {
        return 'pgsql';
    }




    /**
     * @inheritDoc
    */
    public function createQueryBuilder(): QueryBuilderInterface
    {
        return new PgsqlQueryBuilder($this);
    }




    /**
     * @inheritDoc
    */
    public function getDatabase(): DatabaseInterface
    {
        return new PgsqlDatabase($this, $this->getDatabaseName());
    }
}
