<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Query\Builder;

use Laventure\Component\Database\Connection\ConnectionInterface;
use Laventure\Component\Database\Query\Builder\SQL\Expr\Expr;
use Laventure\Component\Database\Query\Builder\SqlQueryBuilder;

/**
 * AbstractQueryBuilder
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection\Query\Builder
*/
abstract class AbstractQueryBuilder implements QueryBuilderInterface
{

    /**
     * @var SqlQueryBuilder
    */
    protected SqlQueryBuilder $builder;


    /**
     * @param ConnectionInterface $connection
    */
    public function __construct(ConnectionInterface $connection)
    {
        $this->builder = new SqlQueryBuilder($connection);
    }





    /**
     * @return Expr
    */
    public function expr(): Expr
    {
        return $this->builder->expr();
    }
}