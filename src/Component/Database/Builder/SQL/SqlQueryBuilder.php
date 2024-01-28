<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Builder\SQL;

use Laventure\Component\Database\Builder\SQL\DML\Contract\DeleteBuilderInterface;
use Laventure\Component\Database\Builder\SQL\DML\Contract\InsertBuilderInterface;
use Laventure\Component\Database\Builder\SQL\DML\Contract\UpdateBuilderInterface;
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
    public function insert(string $table): InsertBuilderInterface
    {

    }




    /**
     * @inheritDoc
    */
    public function update(string $table): UpdateBuilderInterface
    {

    }




    /**
     * @inheritDoc
    */
    public function delete(string $table): DeleteBuilderInterface
    {

    }
}