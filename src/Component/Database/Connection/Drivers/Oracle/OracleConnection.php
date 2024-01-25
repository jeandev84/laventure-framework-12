<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Drivers\Oracle;

use Laventure\Component\Database\Connection\Drivers\Connection;

/**
 * OracleConnection
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection\Drivers
 */
class OracleConnection extends Connection implements OracleConnectionInterface
{
    /**
     * @inheritDoc
    */
    public function getName(): string
    {
        return 'oci';
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
