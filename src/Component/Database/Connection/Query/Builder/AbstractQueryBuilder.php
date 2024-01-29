<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Query\Builder;



/**
 * AbstractQueryBuilder
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection\Client\PDO\Query
*/
abstract class AbstractQueryBuilder implements QueryBuilderInterface
{

    /**
     * @var Criteria
    */
    protected Criteria $criteria;


    public function __construct()
    {
        $this->criteria = new Criteria();
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
        $this->criteria->select->addColumns($columns);

        return $this;
    }





    /**
     * @inheritDoc
    */
    public function from(string $table, string $alias = null): static
    {
        return $this;
    }



    /**
     * @inheritDoc
    */
    public function join(string $table, string $condition): static
    {

    }





    /**
     * @inheritDoc
    */
    public function leftJoin(string $table, string $condition): static
    {

    }




    /**
     * @inheritDoc
    */
    public function rightJoin(string $table, string $condition): static
    {

    }





    /**
     * @inheritDoc
    */
    public function innerJoin(string $table, string $condition): static
    {
        // TODO: Implement innerJoin() method.
    }

    /**
     * @inheritDoc
     */
    public function fullJoin(string $table, string $condition): static
    {
        // TODO: Implement fullJoin() method.
    }

    /**
     * @inheritDoc
     */
    public function addJoin(string $join): static
    {
        // TODO: Implement addJoin() method.
    }

    /**
     * @inheritDoc
     */
    public function groupBy(string $column): static
    {
        // TODO: Implement groupBy() method.
    }

    /**
     * @inheritDoc
     */
    public function addGroupBy(array|string $groupBy): static
    {
        // TODO: Implement addGroupBy() method.
    }

    /**
     * @inheritDoc
     */
    public function having(string $condition): static
    {
        // TODO: Implement having() method.
    }

    /**
     * @inheritDoc
     */
    public function andHaving(string $condition): static
    {
        // TODO: Implement andHaving() method.
    }

    /**
     * @inheritDoc
     */
    public function orHaving(string $condition): static
    {
        // TODO: Implement orHaving() method.
    }

    /**
     * @inheritDoc
     */
    public function orderBy(string $column, string $direction = null): static
    {
        // TODO: Implement orderBy() method.
    }

    /**
     * @inheritDoc
     */
    public function addOrderBy(string $column, string $direction = null): static
    {
        // TODO: Implement addOrderBy() method.
    }

    /**
     * @inheritDoc
     */
    public function setMaxResults(int $limit): static
    {
        // TODO: Implement setMaxResults() method.
    }

    /**
     * @inheritDoc
     */
    public function setFirstResult(int $offset): static
    {
        // TODO: Implement setFirstResult() method.
    }

    /**
     * @inheritDoc
     */
    public function insert(string $table): static
    {
        // TODO: Implement insert() method.
    }

    /**
     * @inheritDoc
     */
    public function values(array $values): static
    {
        // TODO: Implement values() method.
    }

    /**
     * @inheritDoc
     */
    public function setValue(string $column, $value): static
    {
        // TODO: Implement setValue() method.
    }

    /**
     * @inheritDoc
     */
    public function update(string $table): static
    {
        // TODO: Implement update() method.
    }

    /**
     * @inheritDoc
     */
    public function set(string $column, $value): static
    {
        // TODO: Implement set() method.
    }

    /**
     * @inheritDoc
     */
    public function delete(string $table): static
    {
        // TODO: Implement delete() method.
    }

    /**
     * @inheritDoc
     */
    public function where(string $condition): static
    {
        // TODO: Implement where() method.
    }

    /**
     * @inheritDoc
     */
    public function andWhere(string $condition): static
    {
        // TODO: Implement andWhere() method.
    }

    /**
     * @inheritDoc
     */
    public function orWhere(string $condition): static
    {
        // TODO: Implement orWhere() method.
    }

    /**
     * @inheritDoc
     */
    public function setParameter($id, $value): static
    {
        // TODO: Implement setParameter() method.
    }

    /**
     * @inheritDoc
     */
    public function getParameter($id): mixed
    {
        // TODO: Implement getParameter() method.
    }

    /**
     * @inheritDoc
     */
    public function setParameters(array $parameters): static
    {
        // TODO: Implement setParameters() method.
    }

    /**
     * @inheritDoc
     */
    public function getParameters(): array
    {
        // TODO: Implement getParameters() method.
    }

    /**
     * @inheritDoc
     */
    public function getSQL(): string
    {
        // TODO: Implement getSQL() method.
    }

    /**
     * @inheritDoc
     */
    public function getQuery(): mixed
    {
        // TODO: Implement getQuery() method.
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        // TODO: Implement __toString() method.
    }
}
