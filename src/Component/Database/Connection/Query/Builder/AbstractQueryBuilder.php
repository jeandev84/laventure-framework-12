<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Query\Builder;

use Laventure\Component\Database\Builder\SQL\Traits\DQL\SelectBuilderTrait;
use Laventure\Component\Database\Connection\ConnectionInterface;

/**
 * QueryBuilder
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection\Query\Builder
*/
abstract class AbstractQueryBuilder implements QueryBuilderInterface
{
    use SelectBuilderTrait;


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
}
