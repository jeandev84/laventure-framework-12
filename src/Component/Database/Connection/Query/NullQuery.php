<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Query;

use Laventure\Component\Database\Connection\Query\Result\NullQueryResult;
use Laventure\Component\Database\Connection\Query\Result\QueryResultInterface;

/**
 * NullQuery
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection\Query
 */
class NullQuery implements QueryInterface
{
    /**
     * @inheritDoc
     */
    public function prepare(string $sql): static
    {
        return $this;
    }




    /**
     * @inheritDoc
     */
    public function query(string $sql): static
    {
        return $this;
    }




    /**
     * @inheritDoc
     */
    public function bindParam($param, $value, int $type): static
    {
        return $this;
    }




    /**
     * @inheritDoc
     */
    public function bindValue($param, $value, int $type): static
    {
        return $this;
    }




    /**
     * @inheritDoc
     */
    public function bindColumn($column, $value, int $type): static
    {
        return $this;
    }




    /**
     * @inheritDoc
     */
    public function withParams(array $params): static
    {
        return $this;
    }





    /**
     * @inheritDoc
     */
    public function execute(): bool
    {
        return false;
    }





    /**
     * @inheritDoc
     */
    public function exec(string $sql): bool
    {
        return false;
    }





    /**
     * @inheritDoc
     */
    public function lastInsertId(string $name = null): int
    {
        return 0;
    }




    /**
     * @inheritDoc
     */
    public function map(string $classname): static
    {
        return $this;
    }





    /**
     * @inheritDoc
     */
    public function fetch(): QueryResultInterface
    {
        return new NullQueryResult();
    }



    /**
     * @inheritDoc
    */
    public function getSQL(): string
    {
        return '';
    }
}
