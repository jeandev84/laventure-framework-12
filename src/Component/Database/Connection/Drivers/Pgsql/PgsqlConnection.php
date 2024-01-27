<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Drivers\Pgsql;

use Laventure\Component\Database\Connection\Connection;
use Laventure\Component\Database\Connection\Query\Builder\QueryBuilderInterface;
use Laventure\Component\Database\DatabaseInterface;

/**
 * PgsqlConnection
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection\Drivers\Pgsql
 */
class PgsqlConnection extends Connection implements PgsqlConnectionInterface
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
        return new PgsqlAbstractQueryBuilder($this);
    }





    /**
     * @inheritDoc
    */
    public function getDatabase(): DatabaseInterface
    {
        return new PgsqlDatabase($this, $this->getDatabaseName());
    }
}
