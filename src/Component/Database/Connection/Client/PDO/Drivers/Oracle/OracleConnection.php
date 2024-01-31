<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Client\PDO\Drivers\Oracle;

use Laventure\Component\Database\Connection\Client\PDO\Drivers\Connection;
use Laventure\Component\Database\Connection\Drivers\Oracle\OracleDatabase;
use Laventure\Component\Database\DatabaseInterface;
use Laventure\Component\Database\Query\Builder\QueryBuilderInterface;

/**
 * OracleConnection
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection\Client\PDO\Drivers\Oracle
 */
class OracleConnection extends Connection
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
    public function createQueryBuilder(): QueryBuilderInterface
    {
        return new OracleQueryBuilder($this);
    }





    /**
     * @inheritDoc
    */
    public function getDatabase(): DatabaseInterface
    {
        return new OracleDatabase($this, $this->getDatabaseName());
    }
}
