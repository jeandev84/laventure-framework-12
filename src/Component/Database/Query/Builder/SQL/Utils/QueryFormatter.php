<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Query\Builder\SQL\Utils;

use Laventure\Component\Database\Query\Builder\SQL\Expr\ExpressionInterface;

/**
 * QueryFormatter
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Builder\SQL\Utils
*/
class QueryFormatter
{
    /**
     * @var array
    */
    protected array $queries = [];



    /**
     * @param string $query
     * @return $this
    */
    public function withQuery(string $query): static
    {
        $this->queries[] = $query;

        return $this;
    }



    /**
     * @param array $queries
     * @return $this
    */
    public function withQueries(array $queries): static
    {
        foreach ($queries as $query) {
            $this->withQuery($query);
        }

        return $this;
    }




    /**
     * @param ExpressionInterface $expression
     *
     * @return $this
    */
    public function withExpression(ExpressionInterface $expression): static
    {
        $this->queries[] = strval($expression);

        return $this;
    }






    /**
     * @param ExpressionInterface[] $expressions
     *
     * @return $this
    */
    public function withExpressions(array $expressions): static
    {
        foreach ($expressions as $expression) {
            $this->withExpression($expression);
        }

        return $this;
    }




    /**
     * @return string
    */
    public function format(): string
    {
        return join(' ', array_filter($this->queries)) . ";";
    }




    /**
     * @return string
    */
    public function __toString(): string
    {
        return $this->format();
    }




    /**
     * @return void
    */
    public function clear(): void
    {
        $this->queries = [];
    }
}
