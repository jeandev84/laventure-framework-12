<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Client\PDO\Drivers\Mysql;

use Laventure\Component\Database\Connection\Client\PDO\Drivers\Connection;
use Laventure\Component\Database\Connection\Drivers\Mysql\MysqlDatabase;
use Laventure\Component\Database\Connection\Query\Builder\QueryBuilderInterface;
use Laventure\Component\Database\DatabaseInterface;

/**
 * MysqlConnection
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection\Client\PDO\Drivers\Mysql
*/
class MysqlConnection extends Connection
{
    /**
     * @inheritDoc
    */
    public function getName(): string
    {
        return 'mysql';
    }



    /**
     * @inheritDoc
    */
    public function createQueryBuilder(): QueryBuilderInterface
    {
        return new MysqlQueryBuilder($this);
    }




    /**
     * @inheritDoc
    */
    public function getDatabase(): DatabaseInterface
    {
        return new MysqlDatabase($this, $this->getDatabaseName());
    }
}
