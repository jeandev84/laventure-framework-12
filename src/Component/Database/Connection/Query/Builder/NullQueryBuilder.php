<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Query\Builder;

/**
 * NullQueryBuilder
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection\Query\Builder
 */
class NullQueryBuilder implements QueryBuilderInterface
{

    /**
     * @inheritDoc
    */
    public function select(string ...$columns): static
    {
        return $this;
    }




    /**
     * @inheritDoc
    */
    public function addSelect(string ...$columns): static
    {
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
        return $this;
    }




    /**
     * @inheritDoc
    */
    public function leftJoin(string $table, string $condition): static
    {
        return $this;
    }





    /**
     * @inheritDoc
    */
    public function rightJoin(string $table, string $condition): static
    {
        return $this;
    }




    /**
     * @inheritDoc
    */
    public function innerJoin(string $table, string $condition): static
    {
        return $this;
    }




    /**
     * @inheritDoc
    */
    public function fullJoin(string $table, string $condition): static
    {
        return $this;
    }




    /**
     * @inheritDoc
    */
    public function addJoin(string $join): static
    {
        return $this;
    }




    /**
     * @inheritDoc
    */
    public function groupBy(string ...$columns): static
    {
        return $this;
    }




    /**
     * @inheritDoc
    */
    public function addGroupBy(string ...$columns): static
    {
        return $this;
    }





    /**
     * @inheritDoc
    */
    public function having(string $condition): static
    {
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
    public function orderBy(string $column, string $direction = null): static
    {
        return $this;
    }




    /**
     * @inheritDoc
    */
    public function addOrderBy(string $orderBy): static
    {
        return $this;
    }




    /**
     * @inheritDoc
    */
    public function setMaxResults(int $limit): static
    {
        return $this;
    }





    /**
     * @inheritDoc
    */
    public function setFirstResult(int $offset): static
    {
        return $this;
    }





    /**
     * @inheritDoc
    */
    public function insert(string $table): static
    {
        return $this;
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
    public function setValue(string $column, $value): static
    {
        return $this;
    }







    /**
     * @inheritDoc
    */
    public function update(string $table): static
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
    public function delete(string $table): static
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
    public function setParameter($id, $value): static
    {
        return $this;
    }





    /**
     * @inheritDoc
    */
    public function getParameter($id): mixed
    {
        return null;
    }




    /**
     * @inheritDoc
    */
    public function setParameters(array $parameters): static
    {
        return $this;
    }




    /**
     * @inheritDoc
    */
    public function getParameters(): array
    {
        return [];
    }




    /**
     * @inheritDoc
    */
    public function getCriteria(): mixed
    {
        return null;
    }




    /**
     * @inheritDoc
    */
    public function getSQL(): string
    {
        return '';
    }




    /**
     * @inheritDoc
    */
    public function getQuery(): mixed
    {
        return null;
    }



    /**
     * @inheritDoc
    */
    public function __toString(): string
    {
        return '';
    }
}