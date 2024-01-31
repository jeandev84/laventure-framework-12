<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Query\Builder;

use Laventure\Component\Database\Connection\ConnectionInterface;
use Laventure\Component\Database\Query\Builder\SQL\DML\Delete\DeleteBuilder;
use Laventure\Component\Database\Query\Builder\SQL\DML\Delete\DeleteBuilderInterface;
use Laventure\Component\Database\Query\Builder\SQL\DML\Insert\InsertBuilder;
use Laventure\Component\Database\Query\Builder\SQL\DML\Insert\InsertBuilderInterface;
use Laventure\Component\Database\Query\Builder\SQL\DML\Update\UpdateBuilder;
use Laventure\Component\Database\Query\Builder\SQL\DML\Update\UpdateBuilderInterface;
use Laventure\Component\Database\Query\Builder\SQL\DQL\Contract\SelectBuilderInterface;
use Laventure\Component\Database\Query\Builder\SQL\DQL\SelectBuilder;

/**
 * SqlQueryBuilder
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Query\Builder
 */
class SqlQueryBuilder implements SqlQueryBuilderInterface
{

    /**
     * @var ConnectionInterface
    */
    protected ConnectionInterface $connection;



    /**
     * @param ConnectionInterface $connection
    */
    public function __construct(ConnectionInterface $connection)
    {
        $this->connection = $connection;
    }



    /**
     * @inheritDoc
    */
    public function select(string ...$selects): SelectBuilderInterface
    {
        return new SelectBuilder($this->connection, ...$selects);
    }





    /**
     * @inheritDoc
    */
    public function insert(string $table): InsertBuilderInterface
    {
        return new InsertBuilder($this->connection, $table);
    }




    /**
     * @inheritDoc
    */
    public function update(string $table): UpdateBuilderInterface
    {
        return new UpdateBuilder($this->connection, $table);
    }




    /**
     * @inheritDoc
    */
    public function delete(string $table): DeleteBuilderInterface
    {
        return new DeleteBuilder($this->connection, $table);
    }
}