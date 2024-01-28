<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Query\Builder\Traits;


use Laventure\Component\Database\Connection\ConnectionInterface;
use Laventure\Component\Database\Connection\Query\Builder\Builder;

/**
 * QueryBuilderTrait
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection\Query\Builder\Traits
*/
trait QueryBuilderTrait
{
    /**
     * @var Builder
     */
    protected Builder $builder;


    /**
     * @var int
     */
    protected int $index = 0;




    /**
     * @param ConnectionInterface $connection
     */
    public function __construct(ConnectionInterface $connection)
    {
        $this->builder = new Builder($connection);
    }



    /**
     * @inheritDoc
     */
    public function select(string ...$columns): static
    {
        $this->builder->select()->select(...$columns);

        return $this;
    }





    /**
     * @inheritDoc
     */
    public function addSelect(string $columns): static
    {
        $this->builder->select()->addSelect($columns);

        return $this;
    }




    /**
     * @inheritDoc
     */
    public function from(string $table, string $alias = null): static
    {
        $this->builder->select()->from($table, $alias);

        return $this;
    }




    /**
     * @inheritDoc
     */
    public function join(string $table, string $condition): static
    {
        $this->builder->select()->join($table, $condition);

        return $this;
    }





    /**
     * @inheritDoc
     */
    public function leftJoin(string $table, string $condition): static
    {
        $this->builder->select()->leftJoin($table, $condition);

        return $this;
    }




    /**
     * @inheritDoc
     */
    public function rightJoin(string $table, string $condition): static
    {
        $this->builder->select()->rightJoin($table, $condition);

        return $this;
    }





    /**
     * @inheritDoc
     */
    public function innerJoin(string $table, string $condition): static
    {
        $this->builder->select()->innerJoin($table, $condition);

        return $this;
    }





    /**
     * @inheritDoc
     */
    public function fullJoin(string $table, string $condition): static
    {
        $this->builder->select()->fullJoin($table, $condition);

        return $this;
    }




    /**
     * @inheritDoc
     */
    public function addJoin(string $join): static
    {
        $this->builder->select()->addJoin($join);

        return $this;
    }




    /**
     * @inheritDoc
     */
    public function groupBy(string $column): static
    {
        $this->builder->select()->groupBy($column);

        return $this;
    }




    /**
     * @inheritDoc
     */
    public function addGroupBy(array|string $groupBy): static
    {
        $this->builder->select()->addGroupBy($groupBy);

        return $this;
    }





    /**
     * @inheritDoc
     */
    public function having(string $condition): static
    {
        $this->builder->select()->having($condition);

        return $this;
    }






    /**
     * @inheritDoc
     */
    public function andHaving(string $condition): static
    {
        $this->builder->select()->andHaving($condition);

        return $this;
    }




    /**
     * @inheritDoc
     */
    public function orHaving(string $condition): static
    {
        $this->builder->select()->orHaving($condition);

        return $this;
    }




    /**
     * @inheritDoc
     */
    public function orderBy(string $column, string $direction = null): static
    {
        $this->builder->select()->orderBy($column, $direction);

        return $this;
    }




    /**
     * @inheritDoc
     */
    public function addOrderBy(string $column, string $direction = null): static
    {
        $this->builder->select()->addOrderBy($column, $direction);

        return $this;
    }






    /**
     * @inheritDoc
     */
    public function setMaxResults(int $limit): static
    {
        $this->builder->select()->limit($limit);

        return $this;
    }







    /**
     * @inheritDoc
     */
    public function setFirstResult(int $offset): static
    {
        $this->builder->select()->offset($offset);

        return $this;
    }





    /**
     * @inheritDoc
     */
    abstract public function insert(string $table): static;




    /**
     * @inheritdoc
    */
    abstract public function values(array $values): static;




    /**
     * @inheritdoc
    */
    abstract public function setValue(string $column, $value): static;





    /**
     * @inheritDoc
     */
    public function update(string $table): static
    {
        $this->builder->update()->table($table);

        return $this;
    }







    /**
     * @inheritDoc
     */
    abstract public function set(string $column, $value): static;






    /**
     * @inheritDoc
     */
    public function delete(string $table, string $alias = ''): static
    {
        $table = ($alias ? "$table $alias": $table);

        $this->builder->delete()->table($table);

        return $this;
    }





    /**
     * @inheritDoc
    */
    public function where(string $condition): static
    {
        return $this->andWhere($condition);
    }






    /**
     * @inheritDoc
     */
    public function andWhere(string $condition): static
    {
        $this->builder->andWhere($condition);

        return $this;
    }






    /**
     * @inheritDoc
     */
    public function orWhere(string $condition): static
    {
        $this->builder->orWhere($condition);

        return $this;
    }






    /**
     * @inheritDoc
    */
    public function setParameter($id, $value): static
    {
       $this->builder->setParameters([$id => $value]);

       return $this;
    }




    /**
     * @inheritDoc
     */
    public function getParameter($id): mixed
    {
        return $this->builder->getParameter($id);
    }




    /**
     * @inheritDoc
     */
    public function setParameters(array $parameters): static
    {
        $this->builder->setParameters($parameters);

        return $this;
    }



    /**
     * @inheritDoc
    */
    public function getParameters(): array
    {
        return $this->builder->getParameters();
    }



    /**
     * @inheritDoc
    */
    public function getSQL(): string
    {
        return $this->builder->getSQL();
    }




    /**
     * @inheritDoc
     */
    public function getQuery(): mixed
    {

    }




    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return $this->getSQL();
    }
}