<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Drivers\Mysql;

use Laventure\Component\Database\Connection\ConnectionInterface;
use Laventure\Component\Database\Connection\Query\Builder\AbstractQueryBuilder;

/**
 * MysqlQueryBuilder
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection\Drivers\Mysql
*/
class MysqlAbstractQueryBuilder extends AbstractQueryBuilder
{
    /**
     * @param MysqlConnectionInterface $connection
    */
    public function __construct(MysqlConnectionInterface $connection)
    {
        parent::__construct($connection);
    }
}
