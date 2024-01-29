<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Builder\SQL;

use Laventure\Component\Database\Builder\SQL\DML\Contract\DeleteBuilderInterface;
use Laventure\Component\Database\Builder\SQL\DML\Contract\InsertBuilderInterface;
use Laventure\Component\Database\Builder\SQL\DML\Contract\UpdateBuilderInterface;
use Laventure\Component\Database\Builder\SQL\DML\DeleteBuilder;
use Laventure\Component\Database\Builder\SQL\DML\InsertBuilder;
use Laventure\Component\Database\Builder\SQL\DML\UpdateBuilder;
use Laventure\Component\Database\Builder\SQL\DQL\Contract\SelectBuilderInterface;
use Laventure\Component\Database\Builder\SQL\DQL\SelectBuilder;
use Laventure\Component\Database\Connection\ConnectionInterface;

/**
 * SqlQueryBuilder
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Builder\SQL
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
    public function select(string ...$columns): SelectBuilderInterface
    {
        $builder = new SelectBuilder($this->connection);
        $builder->select(...$columns);
        return $builder;
    }




    /**
     * @inheritDoc
    */
    public function insert(string $table, array $attributes): InsertBuilderInterface
    {
        $builder = new InsertBuilder($this->connection, $table);
        $builder->insert($attributes);
        return $builder;
    }




    /**
     * @inheritDoc
    */
    public function update(string $table, array $attributes): UpdateBuilderInterface
    {
        $builder = new UpdateBuilder($this->connection, $table);
        $builder->update($attributes);
        return $builder;
    }




    /**
     * @inheritDoc
    */
    public function delete(string $table): DeleteBuilderInterface
    {
        return new DeleteBuilder($this->connection, $table);
    }
}