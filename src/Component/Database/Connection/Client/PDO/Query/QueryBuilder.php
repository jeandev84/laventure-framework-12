<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Client\PDO\Query;

use Laventure\Component\Database\Builder\SQL\Traits\DQL\SelectBuilderTrait;
use Laventure\Component\Database\Connection\Client\PDO\PdoConnectionInterface;
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
     * @var PdoConnectionInterface
    */
    protected PdoConnectionInterface $connection;

    use SelectBuilderTrait;



    /**
     * @param PdoConnectionInterface $connection
    */
    public function __construct(PdoConnectionInterface $connection)
    {
        $this->connection = $connection;
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
    public function setValue($column, $value): static
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
    public function setParameter($id, $value, $type = null): static
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
        return '';
    }

    /**
     * @inheritDoc
     */
    public function getQuery(): QueryInterface
    {
        // TODO: Implement getQuery() method.
    }




    /**
     * @inheritDoc
    */
    public function __toString(): string
    {
        return $this->getSQL();
    }




    /**
     * @inheritdoc
    */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}
