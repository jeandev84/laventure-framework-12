<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Drivers\Mysql;

use Closure;
use Laventure\Component\Database\Configuration\Contract\ConfigurationInterface;
use Laventure\Component\Database\Connection\Drivers\DriverConnection;
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
class MysqlConnection extends DriverConnection implements MysqlConnectionInterface
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

    }





    /**
     * @inheritDoc
     */
    public function createDatabase(): mixed
    {

    }





    /**
     * @inheritDoc
    */
    public function dropDatabase(): mixed
    {

    }





    /**
     * @inheritDoc
    */
    public function hasDatabase(): bool
    {

    }





    /**
     * @inheritDoc
    */
    public function hasTable(string $name): bool
    {

    }





    /**
     * @inheritDoc
    */
    public function getTables(): array
    {

    }
}
