<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Builder\SQL\DQL;

use Laventure\Component\Database\Builder\SQL\DQL\Contract\SelectBuilderInterface;

/**
 * SelectBuilder
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Builder\SQL\DQL\Selected
*/
class SelectBuilder implements SelectBuilderInterface
{


    /**
     * @var SelectCriteria
    */
    protected SelectCriteria $criteria;



    /**
     * @param SelectCriteria $criteria
    */
    public function __construct(SelectCriteria $criteria)
    {
        $this->criteria = $criteria;
    }



    /**
     * @inheritDoc
    */
    public function select(string ...$columns): static
    {
        return $this->addSelect(...$columns);
    }




    /**
     * @inheritDoc
     */
    public function addSelect(string ...$columns): static
    {
        $this->criteria->columns = array_merge(
            $this->criteria->columns,
            $columns
        );

        return $this;
    }




    /**
     * @inheritDoc
     */
    public function from(string $table, string $alias = null): static
    {
        $this->criteria->from[$table] = ($alias ? "$table $alias" : $table);

        return $this;
    }



    /**
     * @inheritDoc
     */
    public function join(string $table, string $condition): static
    {
        return $this->addJoin("JOIN $table ON $condition");
    }




    /**
     * @inheritDoc
     */
    public function leftJoin(string $table, string $condition): static
    {
        return $this->addJoin("LEFT $table ON $condition");
    }





    /**
     * @inheritDoc
     */
    public function rightJoin(string $table, string $condition): static
    {
        return $this->addJoin("RIGHT JOIN $table ON $condition");
    }




    /**
     * @inheritDoc
     */
    public function innerJoin(string $table, string $condition): static
    {
        return $this->addJoin("INNER JOIN $table ON $condition");
    }




    /**
     * @inheritDoc
     */
    public function fullJoin(string $table, string $condition): static
    {
        return $this->addJoin("FULL JOIN $table ON $condition");
    }




    /**
     * @inheritDoc
    */
    public function addJoin(string $join): static
    {
        $this->criteria->joins[] = $join;

        return $this;
    }




    /**
     * @inheritDoc
    */
    public function groupBy(string ...$columns): static
    {
        return $this->addGroupBy(...$columns);
    }




    /**
     * @inheritDoc
    */
    public function addGroupBy(string ...$columns): static
    {
        $this->criteria->groupBy[] = join(', ', $columns);

        return $this;
    }





    /**
     * @inheritDoc
     */
    public function having(string $condition): static
    {
        $this->criteria->having[] = $condition;

        return $this;
    }





    /**
     * @inheritDoc
     */
    public function andHaving(string $condition): static
    {
        return $this;
    }




    /**
     * @inheritDoc
     */
    public function orHaving(string $condition): static
    {
        return $this;
    }




    /**
     * @inheritDoc
     */
    public function orderBy(string $column, string $direction = 'asc'): static
    {
        return $this->addOrderBy("$column $direction");
    }




    /**
     * @inheritDoc
     */
    public function addOrderBy(string $orderBy): static
    {
        $this->criteria->orderBy[] = $orderBy;

        return $this;
    }



    /**
     * @inheritDoc
    */
    public function limit(int $limit): static
    {
        $this->criteria->limit = $limit;

        return $this;
    }





    /**
     * @inheritDoc
    */
    public function offset(int $offset): static
    {
        $this->criteria->offset = $offset;

        return $this;
    }





    /**
     * @inheritDoc
    */
    public function getCriteria(): SelectCriteria
    {
        return $this->criteria;
    }
}