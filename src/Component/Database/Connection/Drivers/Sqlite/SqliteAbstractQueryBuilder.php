<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Drivers\Sqlite;

use Laventure\Component\Database\Connection\ConnectionInterface;
use Laventure\Component\Database\Connection\Query\Builder\AbstractQueryBuilder;

/**
 * SqliteQueryBuilder
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection\Drivers\Sqlite
*/
class SqliteAbstractQueryBuilder extends AbstractQueryBuilder
{
    /**
     * @param SqliteConnectionInterface $connection
    */
    public function __construct(SqliteConnectionInterface $connection)
    {
        parent::__construct($connection);
    }
}