<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Query\Builder\SQL\Conditions\Traits;

use Laventure\Component\Database\Query\Builder\SQL\Conditions\Expr\Where;

/**
 * ConditionTrait
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Query\Builder\SQL\Conditions\Traits
 */
trait ConditionTrait
{
    /**
     * @var array
    */
    public array $wheres = [];




    /**
     * @param string $condition
     * @return $this
    */
    public function where(string $condition): static
    {
        return $this->andWhere($condition);
    }





    /**
     * @param string $condition
     * @return $this
    */
    public function andWhere(string $condition): static
    {
        $this->wheres['AND'][] = $condition;

        return $this;
    }






    /**
     * @param string $condition
     * @return $this
    */
    public function orWhere(string $condition): static
    {
        $this->wheres['OR'][] = $condition;

        return $this;
    }






    /**
     * @return array
    */
    public function getConditions(): array
    {
        return $this->wheres;
    }
}
