<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Builder\SQL\Traits\DML;

/**
 * UpdateBuilderTrait
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Builder\SQL\DML\Traits
 */
trait UpdateBuilderTrait
{

    /**
     * @var string
    */
    protected string $update;


    /**
     * @var array
    */
    protected array $set = [];



    /**
     * @param string $table
     * @param string $alias
     * @return $this
    */
    public function update(string $table, string $alias = ''): static
    {
        $this->update = "UPDATE $table $alias";

        return $this;
    }




    /**
     * @param string $column
     * @param $value
     * @return $this
    */
    public function set(string $column, $value): static
    {
        $this->set[$column] = "$column = $value";

        return $this;
    }






    /**
     * Returns update query
     *
     * @return string
    */
    abstract public function buildUpdateQuery(): string;
}
