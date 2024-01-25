<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Drivers\Mysql;

use Closure;
use Laventure\Component\Database\Configuration\Contract\ConfigurationInterface;
use Laventure\Component\Database\Connection\Drivers\Connection;
use Laventure\Component\Database\Connection\Query\QueryInterface;

/**
 * MysqlConnection
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection\Drivers
*/
class MysqlConnection extends Connection implements MysqlConnectionInterface
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
    public function getDatabases(): array
    {
        return [];
    }





    /**
     * @inheritDoc
     */
    public function createDatabase(): mixed
    {
        return false;
    }





    /**
     * @inheritDoc
    */
    public function dropDatabase(): mixed
    {
        return false;
    }






    /**
     * @inheritDoc
    */
    public function hasTable(string $name): bool
    {
        return false;
    }





    /**
     * @inheritDoc
    */
    public function getTables(): array
    {
        return [];
    }
}
