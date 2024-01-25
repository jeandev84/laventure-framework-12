<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Client\PDO\Query;

use Laventure\Component\Database\Connection\Client\PDO\PdoClientInterface;
use Laventure\Component\Database\Connection\Query\Builder\QueryBuilderInterface;
use Laventure\Component\Database\Connection\Query\QueryInterface;

/**
 * QueryBuilder
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection\Client\PDO\Query
*/
class QueryBuilder implements QueryBuilderInterface
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
     * @var array
    */
    protected array $types = [];




    /**
     * @inheritDoc
    */
    public function select(string ...$columns): static
    {
        $this->selects = array_merge($this->selects, $columns ?: ["*"]);

        return $this;
    }





    /**
     * @inheritDoc
    */
    public function addSelect(string $columns): static
    {
        $this->selects[] = $columns;

        return $this;
    }




    /**
     * @inheritDoc
    */
    public function from(string $table, string $alias = null): static
    {
        $this->from[$table] = $alias ? "$table $alias" : $table;

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
        return $this->addJoin("LEFT JOIN $table ON $condition");
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
        $this->joins[] = $join;

        return $this;
    }





    /**
     * @inheritDoc
    */
    public function groupBy(string $column): static
    {
        return $this->addGroupBy($column);
    }






    /**
     * @inheritDoc
    */
    public function addGroupBy(array|string $groupBy): static
    {
        $this->groupBy[] = join(', ', (array)$groupBy);

        return $this;
    }





    /**
     * @inheritDoc
    */
    public function having(string $condition): static
    {
        $this->having[] = $condition;

        return $this;
    }






    /**
     * @inheritDoc
    */
    public function orderBy(string $column, string $direction = null): static
    {
        return $this->addOrderBy($column, $direction);
    }







    /**
     * @inheritDoc
    */
    public function addOrderBy(string $column, string $direction = null): static
    {
        $this->orderBy[] = "$column " . ($direction ?: 'asc');

        return $this;
    }






    /**
     * @inheritDoc
    */
    public function limit(int $limit): static
    {
        return $this;
    }





    /**
     * @inheritDoc
    */
    public function offset(int $limit): static
    {
        return $this;
    }








    /**
     * @inheritDoc
     */
    public function where(string $condition): static
    {
         return $this;
    }





    /**
     * @inheritDoc
     */
    public function andWhere(string $condition): static
    {
       return $this;
    }





    /**
     * @inheritDoc
    */
    public function orWhere(string $condition): static
    {
         return $this;
    }





    /**
     * @inheritDoc
    */
    public function criteria(array $conditions): static
    {
        return $this;
    }






    /**
     * @inheritDoc
    */
    public function insert(string $table): static
    {

    }




    /**
     * @inheritDoc
    */
    public function values(array $values): static
    {
        return $this;
    }





    /**
     * @inheritDoc
    */
    public function setValue($column, $value): static
    {
        return $this;
    }




    /**
     * @inheritDoc
    */
    public function update(string $table, string $alias = ''): static
    {
        return $this;
    }




    /**
     * @inheritDoc
    */
    public function set(string $column, $value): static
    {
        return $this;
    }





    /**
     * @inheritDoc
    */
    public function delete(string $table, string $alias = ''): static
    {
        return $this;
    }







    /**
     * @inheritDoc
    */
    public function setParameter($id, $value, $type = null): static
    {

    }




    /**
     * @inheritDoc
    */
    public function getParameter($id): mixed
    {

    }




    /**
     * @inheritDoc
    */
    public function setParameters(array $parameters): static
    {

    }





    /**
     * @inheritDoc
    */
    public function getParameters(): array
    {

    }






    /**
     * @inheritDoc
    */
    public function getWheres(): mixed
    {
        return [];
    }







    /**
     * @inheritDoc
    */
    public function getSQL(): string
    {
         dd($this->toArray());
    }





    /**
     * @inheritDoc
    */
    public function getQuery(): QueryInterface
    {

    }






    /**
     * @inheritDoc
    */
    public function __toString(): string
    {
        return $this->getSQL();
    }




    public function toArray(): array
    {
        return get_object_vars($this);
    }
}
