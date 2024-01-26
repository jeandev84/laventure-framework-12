<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Client\Mysqli\Query;

use Laventure\Component\Database\Connection\Query\QueryInterface;
use Laventure\Component\Database\Connection\Query\Result\QueryResultInterface;

/**
 * Query
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection\Client\Mysqli\Query
 */
class Query implements QueryInterface
{

    /**
     * @inheritDoc
    */
    public function prepare(string $sql): static
    {
        // TODO: Implement prepare() method.
    }




    /**
     * @inheritDoc
     */
    public function query(string $sql): static
    {
        // TODO: Implement query() method.
    }

    /**
     * @inheritDoc
     */
    public function bindParam($param, $value, int $type): static
    {
        // TODO: Implement bindParam() method.
    }

    /**
     * @inheritDoc
     */
    public function bindValues(array $values): static
    {
        // TODO: Implement bindValues() method.
    }

    /**
     * @inheritDoc
     */
    public function bindValue($param, $value, int $type): static
    {
        // TODO: Implement bindValue() method.
    }

    /**
     * @inheritDoc
     */
    public function bindColumn($column, $value, int $type): static
    {
        // TODO: Implement bindColumn() method.
    }

    /**
     * @inheritDoc
     */
    public function params(array $params): static
    {
        // TODO: Implement params() method.
    }

    /**
     * @inheritDoc
     */
    public function execute(): mixed
    {
        // TODO: Implement execute() method.
    }

    /**
     * @inheritDoc
     */
    public function exec(string $sql): mixed
    {
        // TODO: Implement exec() method.
    }

    /**
     * @inheritDoc
     */
    public function lastInsertId(string $name = null): int
    {
        // TODO: Implement lastInsertId() method.
    }

    /**
     * @inheritDoc
     */
    public function map(string $classname): static
    {
        // TODO: Implement map() method.
    }

    /**
     * @inheritDoc
     */
    public function fetch(): QueryResultInterface
    {
        // TODO: Implement fetch() method.
    }

    /**
     * @inheritDoc
     */
    public function getSQL(): string
    {
        // TODO: Implement getSQL() method.
    }
}