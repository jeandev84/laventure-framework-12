<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Client\Mysqli\Query;

use Laventure\Component\Database\Connection\Query\Result\QueryResultInterface;

/**
 * QueryResult
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection\Client\Mysqli\Query
*/
class QueryResult implements QueryResultInterface
{
    /**
     * @inheritDoc
     */
    public function all(): array
    {
        // TODO: Implement all() method.
    }

    /**
     * @inheritDoc
     */
    public function one(): mixed
    {
        // TODO: Implement one() method.
    }

    /**
     * @inheritDoc
     */
    public function assoc(): array
    {
        // TODO: Implement assoc() method.
    }

    /**
     * @inheritDoc
     */
    public function column(int $column = 0): mixed
    {
        // TODO: Implement column() method.
    }

    /**
     * @inheritDoc
     */
    public function columns(): mixed
    {
        // TODO: Implement columns() method.
    }

    /**
     * @inheritDoc
     */
    public function count(): int
    {
        // TODO: Implement count() method.
    }
}
