<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Query\Builder\SQL\Conditions\Expr;

use Laventure\Component\Database\Query\Builder\SQL\Expr\ExpressionInterface;

/**
 * Where
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Builder\SQL\Where\Expr
 */
class Where implements ExpressionInterface
{
    public function __construct(public array $wheres)
    {
    }



    /**
     * @inheritDoc
    */
    public function __toString(): string
    {
        if (! $this->wheres) {
            return '';
        }

        return sprintf('WHERE %s', $this->buildConditions());
    }




    /**
     * @return string
    */
    private function buildConditions(): string
    {
        $wheres = [];

        $key = key($this->wheres);

        foreach ($this->wheres as $operator => $conditions) {

            if ($key !== $operator) {
                $wheres[] = $operator;
            }

            $wheres[] = implode(" $operator ", $conditions);
        }

        return  join(' ', $wheres);
    }
}
