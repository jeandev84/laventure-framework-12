<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Client\PDO\Query;

use Laventure\Component\Database\Builder\SQL\Contract\DML\DeleteBuilderInterface;
use Laventure\Component\Database\Builder\SQL\Contract\DML\InsertBuilderInterface;
use Laventure\Component\Database\Builder\SQL\Contract\DML\UpdateBuilderInterface;
use Laventure\Component\Database\Builder\SQL\Contract\DQL\SelectBuilderInterface;
use Laventure\Component\Database\Builder\SQL\Contract\SqlQueryBuilderInterface;

/**
 * QueryBuilder
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection\Client\PDO\Query
*/
class QueryBuilder implements SqlQueryBuilderInterface
{
    /**
     * @inheritDoc
    */
    public function select(string ...$columns): SelectBuilderInterface
    {

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
