<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Drivers\Sqlite;

use Laventure\Component\Database\Connection\Connection;
use Laventure\Component\Database\Connection\Query\Builder\QueryBuilderInterface;
use Laventure\Component\Database\DatabaseInterface;

/**
 * SqliteConnection
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection\Drivers\Sqlite
 */
class SqliteConnection extends Connection implements SqliteConnectionInterface
{
    /**
     * @inheritDoc
    */
    public function getName(): string
    {
        return 'sqlite';
    }




    /**
     * @inheritDoc
    */
    public function createQueryBuilder(): QueryBuilderInterface
    {
        return new SqliteAbstractQueryBuilder($this);
    }




    /**
     * @inheritDoc
    */
    public function getDatabase(): DatabaseInterface
    {
        return new SqliteDatabase($this, $this->getDatabaseName());
    }
}
