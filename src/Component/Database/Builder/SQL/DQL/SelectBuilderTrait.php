<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Builder\SQL\DQL;


/**
 * SelectBuilderTrait
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Builder\SQL\DQL
 */
trait SelectBuilderTrait
{
    /**
     * @var array
     */
    public array $selected = [];


    /**
     * @var array
     */
    public array $from = [];



    /**
     * @var string[]
     */
    public array $joins = [];



    /**
     * @var array
     */
    public array $groupBy = [];




    /**
     * @var string[]
     */
    public array $having = [];




    /**
     * @var string[]
     */
    public array $orderBy = [];



    /**
     * @var int
     */
    public int $offset = 0;




    /**s
     * @var int
     */
    public int $limit = 0;






    /**
     * @inheritdoc
     */
    public function select(string ...$columns): static
    {
        $this->selected = array_merge($this->selected, $columns);

        return $this;
    }




    /**
     * @inheritdoc
     */
    public function addSelect(string $columns): static
    {
        $this->selected[] = $columns;

        return $this;
    }





    /**
     * @inheritdoc
     */
    public function from(string $table, string $alias = null): static
    {
        $this->from[$table] = $alias ? "$table $alias" : $table;

        return $this;
    }







    /**
     * @inheritdoc
     */
    public function join(string $table, string $condition): static
    {
        return $this->addJoin("JOIN $table ON $condition");
    }






    /**
     * @inheritdoc
     */
    public function leftJoin(string $table, string $condition): static
    {
        return $this->addJoin("LEFT JOIN $table ON $condition");
    }





    /**
     * @inheritdoc
     */
    public function rightJoin(string $table, string $condition): static
    {
        return $this->addJoin("RIGHT JOIN $table ON $condition");
    }





    /**
     * @inheritdoc
     */
    public function innerJoin(string $table, string $condition): static
    {
        return $this->addJoin("INNER JOIN $table ON $condition");
    }





    /**
     * @inheritdoc
     */
    public function fullJoin(string $table, string $condition): static
    {
        return $this->addJoin("FULL JOIN $table ON $condition");
    }





    /**
     * @inheritdoc
     */
    public function addJoin(string $join): static
    {
        $this->joins[] = $join;

        return $this;
    }





    /**
     * @inheritdoc
     */
    public function groupBy(string $column): static
    {
        return $this->addGroupBy($column);
    }





    /**
     * @inheritdoc
     */
    public function addGroupBy(array|string $groupBy): static
    {
        $this->groupBy[] = join(', ', (array)$groupBy);

        return $this;
    }





    /**
     * @inheritdoc
     */
    public function having(string $condition): static
    {
        $this->having[] = $condition;

        return $this;
    }





    /**
     * @inheritDoc
     */
    public function andHaving(string $condition): static
    {
        trigger_error(__METHOD__ .' not already implemented.');

        return $this;
    }




    /**
     * @inheritDoc
     */
    public function orHaving(string $condition): static
    {
        trigger_error(__METHOD__ .' not already implemented.');

        return $this;
    }






    /**
     * @inheritdoc
     */
    public function orderBy(string $column, string $direction = null): static
    {
        return $this->addOrderBy($column, $direction);
    }





    /**
     * @inheritdoc
     */
    public function addOrderBy(string $column, string $direction = null): static
    {
        $this->orderBy[] = "$column " . ($direction ?: 'asc');

        return $this;
    }





    /**
     * @inheritdoc
    */
    public function limit(int $limit): static
    {
        $this->limit = $limit;

        return $this;
    }




    /**
     * @inheritdoc
    */
    public function offset(int $offset): static
    {
        $this->offset = $offset;

        return $this;
    }






    /**
     * @return string
     */
    protected function selectSQL(): string
    {
        $selected =  join(', ', array_filter($this->selected));
        $columns  =  empty($this->selected) ? "*" : $selected;

        return sprintf('SELECT %s FROM %s', $columns, $this->fromSQL());
    }





    /**
     * @return string
    */
    protected function fromSQL(): string
    {
        return join(', ', array_values($this->from));
    }






    /**
     * @return string
     */
    protected function joinSQL(): string
    {
        return ($this->joins ? join(' ', $this->joins) : '');
    }





    /**
     * @return string
     */
    protected function groupBySQL(): string
    {
        return ($this->groupBy ? sprintf('GROUP BY %s', join($this->groupBy)) : '');
    }





    /**
     * @return string
     */
    protected function havingSQL(): string
    {
        return ($this->having ? sprintf('HAVING %s', join($this->having)) : '');
    }



    /**
     * @return string
     */
    protected function orderBySQL(): string
    {
        return ($this->orderBy ? rtrim(sprintf('ORDER BY %s', join(',', $this->orderBy))) : '');
    }




    /**
     * @return string
    */
    protected function limitSQL(): string
    {
        if (! $this->limit) {
            return '';
        }

        $limit = "LIMIT $this->limit";

        if ($this->offset) {
            return "$limit OFFSET $this->offset";
        }

        return $limit;
    }
}