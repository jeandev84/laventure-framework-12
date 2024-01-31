<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Query\Builder\SQL\DML\Insert;

use Laventure\Component\Database\Connection\ConnectionInterface;
use Laventure\Component\Database\Query\Builder\SQL\BuilderTrait;

/**
 * InsertBuilder
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Builder\SQL\DML\Insert
 */
class InsertBuilder implements InsertBuilderInterface
{

    use BuilderTrait;


    /**
     * @var string
    */
    public string $table;


    /**
     * @var array
    */
    public array $columns = [];




    /**
     * @var array
    */
    public array $values  = [];


    /**
     * @param ConnectionInterface $connection
     *
     * @param string $table
    */
    public function __construct(
        ConnectionInterface $connection,
        string $table
    )
    {
        parent::__construct($connection);
        $this->insert($table);
    }




    /**
     * @inheritDoc
    */
    public function insert(string $table): static
    {
        $this->table = $table;

        return $this;
    }




    /**
     * @inheritDoc
    */
    public function values(array $values): static
    {
        $this->columns  = array_keys($values);

        $this->values[] = $values;

        return $this;
    }





    /**
     * @inheritDoc
    */
    public function setValue(string $column, $value, int $index = 0): static
    {
        if (!isset($this->values[$index])) {
            $this->values[$index] = [];
        }

        $this->values[$index][$column] = $value;

        return $this;
    }





    /**
     * @inheritDoc
    */
    public function getSQL(): string
    {
        return $this->formatter->withExpression(
            new Insert($this->table, $this->columns, $this->values)
        )->format();
    }
}
