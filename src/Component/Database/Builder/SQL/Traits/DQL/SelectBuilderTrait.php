<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Builder\SQL\Traits\DQL;

/**
 * SelectBuilderTrait
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Builder\SQL\DQL\Traits
*/
trait SelectBuilderTrait
{
    /**
     * @var array
    */
    protected array $selects = [];


    /**
     * @var array
    */
    protected array $from = [];



    /**
     * @var string[]
    */
    protected array $joins = [];



    /**
     * @var array
    */
    protected array $groupBy = [];




    /**
     * @var string[]
    */
    protected array $having = [];




    /**
     * @var string[]
    */
    protected array $orderBy = [];



    /**
     * @var int
    */
    protected int $offset = 0;




    /**s
     * @var int
    */
    protected int $limit = 0;






    /**
     * @param string ...$columns
     * @return $this
    */
    public function select(string ...$columns): static
    {
        $this->selects = array_merge($this->selects, $columns ?: ["*"]);

        return $this;
    }




    /**
     * @param string $columns
     * @return $this
    */
    public function addSelect(string $columns): static
    {
        $this->selects[] = $columns;

        return $this;
    }





    /**
     * @param string $table
     * @param string|null $alias
     * @return $this
    */
    public function from(string $table, string $alias = null): static
    {
        $this->from[$table] = $alias ? "$table $alias" : $table;

        return $this;
    }






    /**
     * @param string $table
     * @param string $condition
     * @return $this
    */
    public function join(string $table, string $condition): static
    {
        return $this->addJoin("JOIN $table ON $condition");
    }






    /**
     * @param string $table
     * @param string $condition
     * @return $this
    */
    public function leftJoin(string $table, string $condition): static
    {
        return $this->addJoin("LEFT JOIN $table ON $condition");
    }





    /**
     * @param string $table
     * @param string $condition
     * @return $this
    */
    public function rightJoin(string $table, string $condition): static
    {
        return $this->addJoin("RIGHT JOIN $table ON $condition");
    }





    /**
     * @param string $table
     * @param string $condition
     * @return $this
    */
    public function innerJoin(string $table, string $condition): static
    {
        return $this->addJoin("INNER JOIN $table ON $condition");
    }





    /**
     * @param string $table
     * @param string $condition
     * @return $this
    */
    public function fullJoin(string $table, string $condition): static
    {
        return $this->addJoin("FULL JOIN $table ON $condition");
    }





    /**
     * @param string $join
     * @return $this
    */
    public function addJoin(string $join): static
    {
        $this->joins[] = $join;

        return $this;
    }





    /**
     * @param string $column
     * @return $this
    */
    public function groupBy(string $column): static
    {
        return $this->addGroupBy($column);
    }





    /**
     * @param array|string $groupBy
     * @return $this
    */
    public function addGroupBy(array|string $groupBy): static
    {
        $this->groupBy[] = join(', ', (array)$groupBy);

        return $this;
    }





    /**
     * @param string $condition
     * @return $this
    */
    public function having(string $condition): static
    {
        $this->having[] = $condition;

        return $this;
    }





    /**
     * @param string $column
     * @param string|null $direction
     * @return $this
    */
    public function orderBy(string $column, string $direction = null): static
    {
        return $this->addOrderBy($column, $direction);
    }





    /**
     * @param string $column
     * @param string|null $direction
     * @return $this
    */
    public function addOrderBy(string $column, string $direction = null): static
    {
        $this->orderBy[] = "$column " . ($direction ?: 'asc');

        return $this;
    }





    /**
     * @param int $limit
     * @return $this
    */
    public function limit(int $limit): static
    {
        $this->limit = $limit;

        return $this;
    }




    /**
     * @param int $offset
     * @return $this
    */
    public function offset(int $offset): static
    {
        $this->offset = $offset;

        return $this;
    }




    /**
     * Returns select query
     *
     * @return string
    */
    abstract public function buildSelectQuery(): string;
}
