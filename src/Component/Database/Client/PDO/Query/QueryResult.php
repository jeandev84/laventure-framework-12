<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Client\PDO\Query;

use Laventure\Component\Database\Connection\Query\Result\QueryResultInterface;
use PDO;
use PDOStatement;

/**
 * QueryResult
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Client\PDO\Query
 */
class QueryResult implements QueryResultInterface
{
    /**
     * @var PDOStatement
    */
    protected PDOStatement $statement;


    /**
     * @param PDOStatement $statement
    */
    public function __construct(PDOStatement $statement)
    {
        $this->statement = $statement;
    }




    /**
     * @inheritDoc
    */
    public function all(): array
    {
        return $this->statement->fetchAll();
    }





    /**
     * @inheritDoc
    */
    public function one(): mixed
    {
        return $this->statement->fetch();
    }




    /**
     * @inheritDoc
    */
    public function assoc(): array
    {
        return $this->statement->fetchAll(PDO::FETCH_ASSOC);
    }




    /**
     * @inheritDoc
    */
    public function column(int $column = 0): mixed
    {
        return $this->statement->fetchColumn($column);
    }




    /**
     * @inheritDoc
    */
    public function columns(): array|false
    {
        return $this->statement->fetchAll(PDO::FETCH_COLUMN);
    }




    /**
     * @inheritDoc
    */
    public function count(): int
    {
        return $this->statement->rowCount();
    }
}
