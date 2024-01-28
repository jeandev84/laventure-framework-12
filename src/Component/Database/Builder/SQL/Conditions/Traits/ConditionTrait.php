<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Builder\SQL\Conditions\Traits;

/**
 * ConditionTrait
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Builder\SQL\Conditions\Traits
 *
 * //TODO refactoring check AND operator via andX, orX ...
*/
trait ConditionTrait
{

    /**
     * @var array
    */
    protected array $wheres = [];



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




    /**
     * Returns conditions query
     *
     * @return string
    */
    public function whereSQL(): string
    {
         if (! $this->wheres) {
             return '';
         }

        $wheres = [];

        $key = key($this->wheres);

        foreach ($this->wheres as $operator => $conditions) {

            if ($key !== $operator) {
                $wheres[] = $operator;;
            }

            $wheres[] = implode(" $operator ", $conditions);
        }

        return sprintf('WHERE %s', join(' ', $wheres));
    }
}
