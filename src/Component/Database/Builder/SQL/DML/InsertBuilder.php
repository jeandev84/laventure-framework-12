<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Builder\SQL\DML;

use Laventure\Component\Database\Builder\SQL\BuilderTrait;
use Laventure\Component\Database\Builder\SQL\DML\Contract\InsertBuilderInterface;
use Laventure\Component\Database\Builder\SQL\SettableInterface;

/**
 * InsertBuilder
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Builder\SQL\DML
 */
class InsertBuilder implements InsertBuilderInterface, SettableInterface
{

    use BuilderTrait;


    /**
     * @var array
    */
    protected array $columns = [];



    /**
     * @var array
    */
    protected array $values = [];





    /**
     * @inheritDoc
    */
    public function insert(array $attributes): static
    {
        $this->columns  = array_keys($attributes);
        $this->values   = array_merge($this->values, array_values($attributes));

        return $this;
    }





    /**
     * @inheritdoc
    */
    public function set($column, $value): static
    {
        $this->columns[] = $column;
        $this->values[]  = $value;

        return $this;
    }





    /**
     * @return array
    */
    public function getColumns(): array
    {
        return $this->columns;
    }





    /**
     * @return array
     */
    public function getValues(): array
    {
        return $this->values;
    }







    /**
     * @inheritDoc
    */
    public function getSQL(): string
    {
        $columns = join(', ', $this->getColumns());
        $values  = '('. join(', ', $this->getValues()) . ')';

        return sprintf("INSERT INTO {$this->getTable()} (%s) VALUES %s;", $columns, $values);
    }





    /**
     * @return int
    */
    public function execute(): int
    {
        $statement = $this->getQuery();

        if (!$statement->execute()) {
             return 0;
        }

        return $statement->lastInsertId();
    }
}