<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Drivers\Mysql;

use Laventure\Component\Database\Database;

/**
 * MysqlDatabase
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection\Drivers\Mysql
*/
class MysqlDatabase extends Database
{

    /**
     * @inheritDoc
     */
    public function create(): mixed
    {
        // TODO: Implement create() method.
    }

    /**
     * @inheritDoc
     */
    public function drop(): mixed
    {
        // TODO: Implement drop() method.
    }

    /**
     * @inheritDoc
     */
    public function getSchemas(): array
    {
        // TODO: Implement getSchemas() method.
    }
}